<?php

declare(strict_types=1);

namespace App\Router;

use Nette;
use Nette\Application\Routers\RouteList;
use Nette\Application\Routers\Route;


class RouterFactory
{
	use Nette\StaticClass;

	public static function createRouter(): RouteList
	{
		$router = new RouteList;
		$router[] = new Route('index.php', 'Front:Default:default', Route::ONE_WAY);

		/////////////////////// ADMIN ROUTES ///////////////////////
		$router[] = $adminRouter = new RouteList('Admin');
		$adminRouter[] = new Route('admin/<presenter>/<action>[/<id>]', 'Default:default'); //most general route

		/////////////////////// FRONT ROUTES ///////////////////////
		$router[] = $frontRouter = new RouteList('Front');
		$frontRouter[] = new Route('sitemap.xml', 'Sitemap:default');
		$frontRouter[] = new Route('sitemap', 'Sitemap:default');
		$frontRouter[] = new Route('[<locale=en en|cs>/]news[/<page>[/<id>]]', 'Info:news');
		$frontRouter[] = new Route('[<locale=en en|cs>/]news/<post>/<id>', 'Info:post');
		$frontRouter[] = new Route('[<locale=en en|cs>/]copyright-notice', 'Info:copyright');
		$frontRouter[] = new Route('[<locale=en en|cs>/]terms-of-use', 'Info:tos');
		$frontRouter[] = new Route('[<locale=en en|cs>/]privacy-policy', 'Info:privacy');
		$frontRouter[] = new Route('[<locale=en en|cs>/]rest', 'Default:rest');
		$frontRouter[] = new Route('[<locale=en en|cs>/]training', 'Default:training');
		$frontRouter[] = new Route('[<locale=en en|cs>/]darknet', 'City:darknet');
		$frontRouter[] = new Route('[<locale=en en|cs>/]wastelands', 'City:wastelands');
		$frontRouter[] = new Route('[<locale=en en|cs>/]buildings', 'Buildings:default');
		$frontRouter[] = new Route('[<locale=en en|cs>/]player/detail/<user>', 'Player:detail');

		// APIs
		$frontRouter[] = new Route('api/job', 'Api:job');

		$frontRouter[] = new Route('[<locale=en en|cs>/]<presenter>/<action>[/<id>]', 'Default:default'); //most general route

		return $router;
	}

}

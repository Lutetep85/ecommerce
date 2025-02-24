<?php

namespace gesth;


class PageAdmin extends Page 
{
	public function __construct($opts = array(), $tpl_dir = "/../../../../views/admin/")
	{
		parent::__construct($opts, $tpl_dir);
	}
}


	//require_once __DIR__ . "/vendor/autoload.php"; 

	/*use Rain\Tpl;

	class PageAdmin
	{
		private $tpl;
		private $options = [];
		private $defaults = [
			"data"=>[] 
		];

		public function __construct($opts = array())
		{
			$this->options = array_merge($this->defaults, $opts);

			$config = array(
					"tpl_dir"       => __DIR__."/../../../../views/admin/",
					"cache_dir"     => __DIR__."/../../../../views-cache/",
					"debug"         => true // set to false to improve the speed
				   );
                        
                       echo "Caminho dos templates:" . $config["tpl_dir"] . "<br>";
                        echo "Camindo dos Caches:" . $config["cache_dir"] . "<br>";
			Tpl::configure($config);

			$this->tpl = new Tpl;

			$this->setData($this->options["data"]); 

			$this->tpl->draw("header");
		}


		private function setData($data = array())
		{
			foreach ($data as $key => $value) 
			{
				$this->tpl->assign($key, $value);
			}
		}

		public function setTpl($name, $data = array(), $returnHTML = false)
		{
			$this->setData($data);//

			return $this->tpl->draw($name, $returnHTML);
		}

		public function __destruct()

		{
			$this->tpl->draw("footer");

		}
	}
	*/

?>

<?php
    trait Singleton {
        static private $instance;
        protected function __construct() {}
        private function __clone() {}
        private function __wakeup() {}
        public static function getInstance() {
            return (empty(self::$instance)) ? self::$instance = new self() : self::$instance;
        }
    }

    class Thing {
        use Singleton;

        private $a = 0;

        public function doAction() {
            echo ++$this->a;
        }
    }

    $foo = Thing::getInstance();
    $foo->doAction();
    $foo = Thing::getInstance();
    $foo->doAction();
?>
<?php
//Core App class

class Core{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
        $url = $this->getUrl();

        //look in 'controllers' for first value,
        // ucwords will capitalize the first letter
        if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php'))
        {
            //will set a new controller
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }

        //Require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';
        $this->currentController = new $this->currentController;
    
        //Check the second paer of the URL
        if(isset($url[1]))
        {
            if(method_exists($this->currentController, $url[1])) {

                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        //Get Parameter
        $this->params = $url ? array_values($url) : [];

        //Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    
    }





    public function getUrl() {
        if(isset($_GET['url'])) {
            $url = trim($_GET['url'], '/');

            //Allows tou to filter variales as string/number
            $url = filter_var($url, FILTER_SANITIZE_URL);

            //Breaking it into an array
            $url = explode('/', $url);
            return $url;        
        
        }
    }

}
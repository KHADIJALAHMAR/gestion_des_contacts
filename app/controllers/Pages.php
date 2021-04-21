<?php 
class Pages extends Controller {
    public function __construct()
    {
       
    }
    public function index() {
        
        $data = ['title' => 'Contacts app',
                 'description' => 'Simple contacts management app built on a mini mvc php framework'  
        ];
        $this->view('pages/index',$data);
    }
    public function about() {
        $data = ['title' => 'about us'];
        $this->view('pages/about', $data); 
    }
    
}
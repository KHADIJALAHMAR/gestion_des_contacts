<?php 
class Pages extends Controller {
    public function __construct()
    {
        $this->session = new Session;
    }
    public function index() {
        $this->session->startSession();

        
        $data = ['title' => 'Contacts app',
                 'description' => 'Simple contacts management app built on a mini mvc php framework'  
        ];
        $this->view('pages/index',$data);
    }
    public function about() {
        $data = ['title' => 'about us',
                'description' => 'secure application to store  all your contacts in one place.',
                'version' => '1.0',
                'devs' => 'Adnan Bouthir, Youssef Bouhalla, Khadija Lahmar, Asmaa Talha.'              
    ];
        $this->view('pages/about', $data); 
    }
    
}
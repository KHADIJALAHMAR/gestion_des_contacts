<?php 
class Pages extends Controller {
    public function __construct()
    {
        $this->contactModel = $this->model("Contact");
        $this->session = new Session;
    }
    public function index() {
        $this->session->startSession();
        // print_r($_SESSION);
        
        if (!isset($_SESSION['"username"'])) {
            $data = [   'title' => 'Contacts app',
                        'description' => 'Simple contacts management app built on a mini mvc php framework'  
            ];
            $this->view('pages/index',$data);
        }else {
            // init data array
            $data =[];
            $result = $this->contactModel->getContacts($this->session->getSession('username'));
            foreach ($result as $row) {
                array_push($data,$row);
            }

            $this->view("contacts/contactsPage",$data);
        }
        
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
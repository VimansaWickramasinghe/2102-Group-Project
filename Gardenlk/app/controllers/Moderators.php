<?php

class Moderators extends Controller{
    public function __construct() { 
        $this->moderatorModel = $this->model('Moderator');
    }



    public function M_settings() {
        $moderator = $this->moderatorModel->moderatorDetails();

        $data = [
            'moderator' => $moderator,
            'cpassword' =>'',
            'npassword' =>'',
            'cnpassword' =>'',
            'currentPasswordError' =>'',
            'passwordError' =>'',
            'confirmPasswordError' =>''
        ];



        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                    'name' => trim($_POST['name']),
                    'contactNo' => trim($_POST['cnumber']),
                    'moderator' => $moderator,
                    'cpassword' => $_POST['cpassword'],
                    'npassword' => $_POST['npassword'],
                    'cnpassword' => $_POST['cnpassword'],
                    'currentPasswordError' =>'',
                    'passwordError' =>'',
                    'confirmPasswordError' =>''

            ];

            //Validate confirm password
            if (empty($data['cnpassword'])) {
                $data['confirmPasswordError'] = 'Please enter password.';
            } else {
                if ($data['npassword'] != $data['cnpassword']) {
                $data['confirmPasswordError'] = 'Passwords do not match, please try again.';
                }
            }

            if($this->moderatorModel->updateProfile($data))
                {
                    echo "<script>alert('Moderator details Updated Successfully')</script>";
                    echo "<script>window.location = 'M_settings'</script>";
                    
                }else{
                    die("Something went wrong, Please try again!");
                }
        $this-> view('moderators/M_settings', $data);

            }

            if(empty($data['confirmPasswordError'])){
    
                $moderator = $this->moderatorModel->findModeratorPassword();

                $Passworddata = [
                    'moderator' => $moderator
                ];

                if ($data['cpassword'] == $Passworddata['moderator'][0]->password ){
                    if ($this->moderatorModel->M_changePassword($data)) {
                        //Redirect to the login page
                        header('location: ' . URLROOT . '/moderators/M_review_plant');
                    } else {
                        die('Something went wrong.');
                    }  
                }else{
                    $data['currentPasswordError'] = 'Passwords do not match, please try again.';
                }
            $this-> view('moderators/M_settings', $data);
            }
    

        $this-> view('moderators/M_settings', $data);

    }









    public function M_plant() {
        $plants = $this->moderatorModel->showAllPlants();
        $data = [
            'plants' => $plants
        ];
        $this-> view('moderators/M_plant', $data);

    }









    public function M_review_plant() {
        $plants = $this->moderatorModel->showPlants();

        $data = [
            'plants' => $plants  
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'plant_id' => trim($_POST['plantid']),
            ];
                if($this->moderatorModel->AcceptPlant($data))
                {
                    header("Location: " . URLROOT . "/moderators/M_review_plant");
                }else{
                    die("Something went wrong, Please try again!");
                }
        

       $this-> view('moderators/M_review_plant', $data);

        }
        $this-> view('moderators/M_review_plant', $data);
    }
    
    public function M_rejectPlant(){

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'plant_id' => trim($_POST['plantId']),
            ];
                if($this->moderatorModel->RejectPlant($data))
                {
                    header("Location: " . URLROOT . "/moderators/M_review_plant");
                }else{
                    die("Something went wrong, Please try again!");
                }
        

       $this-> view('moderators/M_review_plant', $data);

        }
    }



}
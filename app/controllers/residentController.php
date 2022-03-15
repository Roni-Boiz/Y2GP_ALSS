<?php

require_once '../app/core/controller.php';

class residentController extends controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
        if (!isset($_SESSION['type'])) {
            header('Location:../homeController/logout');
        } else if ($_SESSION['type'] != 'resident') {
            header('Location:../homeController/logout');
        }

        $this->loadModel('residentModel');
    }

    public function index()
    {
        $this->view->ann = $this->model->getAnnouncement();
        $this->view->render('resident/residentView');
    }

    // view resident profile
    public function profile()
    {
        if (isset($_GET["s"])) {
            if ($_GET["s"] == 1) {
                $this->view->success = true;
            } else {
                $this->view->error = true;
                $this->view->pwerror = true;
            }
        }
        $this->view->users = $this->model->readResident();
        $this->view->members = $this->model->readMembers();
        $this->view->loginDevices = $this->model->getLoginDevices($_SESSION['userId']);
        $this->view->render('resident/profileView');
    }

    // edit profile
    public function editProfile()
    {
        $a = 0;
        if (strlen($_POST["phone_no"]) > 9 && strlen($_POST["email"])) {
            $a = $this->model->editProfile();
        }
        if ($a) {
            header("Refresh:0; url=profile?s=1");
        } else {
            header("Refresh:0; url=profile?s=0");
        }
    }
    public function removeMember()
    {
        $id = $_POST["removedmem"];
        $this->model->removeMember($id);
        $this->profile();
    }

    //change resident password
    public function changePassword()
    {
        $opw = $_POST["opw"];
        $npw = $_POST["npw"];
        $rnpw = $_POST["rnpw"];
        $a = $this->model->changePassword($opw, $npw, $rnpw);
        if ($a) {
            header("Refresh:0; url=profile?s=0");
        } else {
            header("Refresh:0; url=profile?s=1");
        }
    }
   
    //get all reservation for view to resident
    public function yourReservation()
    {
        $id = $_SESSION['userId'];
        $this->view->hall = $this->model->hallReservation($id);
        $this->view->fitness = $this->model->fitnessReservation($id);
        $this->view->treatment = $this->model->treatmentReservation($id);
        $this->view->parking = $this->model->parkingReservation($id);
        $this->view->render('resident/yourReservationView');
    }

    //remove reservation with ajax call
    public function removeReservation()
    {
        return $this->model->removeReservation();
        header("Refresh:0; url=yourReservation");
        // $this->yourReservation();
    }
    //remove reservation with ajax call
    public function removeRequest()
    {
        $this->model->removeRequest();
        header("Refresh:0; url=yourRequest");
        // $this->yourRequest();
    }

    //make fitness centre reservation
    public function fitness()
    {
        $id = $_SESSION['userId'];

        if (isset($_POST["date"]) && isset($_POST["coach"])  && isset($_POST["starttime"])  && isset($_POST["endtime"])) {
            $d = $_POST["date"];
            $coach = $_POST["coach"];
            $stime = $_POST["starttime"] . ":00";
            $etime = $_POST["endtime"] . ":00";
            //check valid time
            if ($stime < $etime) {
                $result = $this->model->reservefitness($d, $coach, $stime, $etime);
                if ($result == 0) {
                    $this->view->error = "Already reserved.Please select another time slot!.";
                } else {
                    $this->view->success = true;
                }
            } else if ($stime > $etime) {
                $this->view->error = "Select valid time slot!";
            }
        } else if (isset($_POST["date"]) && isset($_POST["coach"])) {
            $d = $_POST["date"];
            $coach = $_POST["coach"];

            $this->view->coach = $coach;

            $this->view->day = $this->model->dayfitness($d, $coach);
            $this->view->shiftno = $this->model->getshiftno($d, $coach);
            $this->view->selectdate = $d;
            $this->view->selectcoach = $coach;
        }
        $this->view->latest = $this->model->latestfitness($id);
        $this->view->coach = $this->model->getcoaches();
        $this->view->render('resident/fitnessCentreView');
    }

    //make treatment room reservation
    public function treatment()
    {
        $id = $_SESSION['userId'];


        if (isset($_POST["date"]) && isset($_POST["trtype"])  && isset($_POST["starttime"])  && isset($_POST["endtime"])) {
            $d = $_POST["date"];
            $type = $_POST["trtype"];
            $stime = $_POST["starttime"] . ":00";
            $etime = $_POST["endtime"] . ":00";
            //check valid time
            if ($stime < $etime) {
                $result = $this->model->reservetreatment($d, $type, $stime, $etime);
                if ($result == 0) {
                    $this->view->error = "Already reserved.Please select another time slot!.according to the availability of the day.";
                } else {
                    $this->view->success = $d . " at " . $stime . " - " . $etime . " reserve for " . $type . ".";
                }
            } else if ($stime > $etime) {
                $this->view->error = "Select valid time slot!";
            }
        } else if (isset($_POST["date"])) {
            $d = $_POST["date"];
            $this->view->selectdate = $d;
            $this->view->day = $this->model->daytreatment($d);
        }
        $this->view->treater = $this->model->readtreater();
        $this->view->latest = $this->model->latesttreatment($id);
        $this->view->render('resident/treatmentRoomView');
    }

    //make function and conference hall reservation
    public function hall()
    {
        $id = $_SESSION['userId'];
        //get latest to right panel
        $this->view->latestfun = $this->model->latesthallfun($id);
        $this->view->latestcon = $this->model->latesthallcon($id);
        //for reserve + check available
        if (isset($_POST["date"]) && isset($_POST["type"])  && isset($_POST["starttime"])  && isset($_POST["endtime"]) && isset($_POST["members"])) {
            $d = $_POST["date"];
            $type = $_POST["type"];
            $stime = $_POST["starttime"] . ":00";
            $etime = $_POST["endtime"] . ":00";
            $members = $_POST["members"];
            //check valid time + check member less than 50

            $result = $this->model->reservehall($d, $type, $stime, $etime, $members);
            if ($result == 0) {
                $this->view->error = "Already reserved.Please select another time slot!.";
            } else {
                $this->view->success = true;
            }
        }

        //show reservation(user mention date)
        else if (isset($_POST["date"]) && isset($_POST["type"])) {
            $d = $_POST["date"];
            $type = $_POST["type"];
            $this->view->type = $type;

            $this->view->day = $this->model->dayhall($d, $type);
            $this->view->selectdate = $d;
        }

        $this->view->render('resident/hallView');
    }

    public function parking()
    {
        $id = $_SESSION['userId'];
        $this->view->latest = $this->model->latestparking($id);
        $this->view->slots = $this->model->viewSlots();
        if (isset($_POST["date"]) && isset($_POST["time"])) {
            $d = $_POST["date"];
            $time = $_POST["time"];
            $this->view->day = $this->model->dayparking($d, $time);
        }
        $this->view->render('resident/parkingSlotView');
    }

    public function CheckPark()
    {
        $data = file_get_contents('php://input');
        $data = json_decode($data, true);

        $this->view->Availability = $this->model->checkParking($data);

        echo json_encode($data);
        exit;
    }


    public function payment()
    {
        $id = $_SESSION['userId'];
        $this->view->pay = $this->model->pay($id);
        $this->view->balance = $this->model->readResident();
        $this->view->render('resident/paymentView');
    }

    //get bill details and print like pdf
    public function bill()
    {
        $id = $_SESSION['userId'];
        // particular month
        if (isset($_POST["month"]) && isset($_POST["year"])) {
            $this->view->bill = $this->model->bill($id, $_POST["year"], $_POST["month"]);
            $this->view->payment = $this->model->payment($id, $_POST["year"], $_POST["month"]);
            // convert-number-to-month-name
            $this->view->y = $_POST["year"] . " " . date("F", mktime(0, 0, 0, $_POST["month"], 10));;
            $this->view->billtotal = $this->model->billtotal($id, $_POST["year"], $_POST["month"]);
            //else this month
        } else {
            $this->view->bill = $this->model->bill($id, date('Y'), date('m'));
            $this->view->y = date('Y') . " " . date('F');
            $this->view->payment = $this->model->payment($id, date('Y'), date('m'));
            $this->view->billtotal = $this->model->billtotal($id, date('Y'), date('m'));
            $this->view->balanceforward = $this->model->readResident();
        }

        $this->view->render('resident/billView');
    }

    //get all requests of each resident
    public function yourRequest()
    {
        $id = $_SESSION['userId'];
        $this->view->maintenence = $this->model->maintenence($id);
        $this->view->laundry = $this->model->laundry($id);
        if (isset($_GET["reqid"])) {
            $id=$_GET["reqid"];
            $this->view->reqSelected=$this->model->categorydetail($id);
        }
        $this->view->visitor = $this->model->visitor($id);
        $this->view->render('resident/yourRequestView');
    }

    //make maintenence request
    public function maintenence()
    {
        $id = $_SESSION['userId'];
        if (isset($_POST["pdate"]) && isset($_POST["type"]) && isset($_POST["description"])) {
            $des = $_POST["description"];
            $pdate = $_POST["pdate"];
            $type = $_POST["type"];

            $this->model->reqMaintenence($type, $pdate, $des, $id);
            header("Refresh:0; url=maintenence");
        }
        $this->view->latest = $this->model->latestmaintenence($id);
        $this->view->render('resident/maintenenceView');
    }

    //make laundry request
    public function laundry()
    {
        $id = $_SESSION['userId'];
        if (isset($_POST["type"]) && isset($_POST["description"])) {
            $des = $_POST["description"];
            $type = $_POST["type"];
            $catw1 = $_POST["catw1"];
            $catw2 = $_POST["catw2"];
            $catw3 = $_POST["catw3"];
            $quantity1 = $_POST["quantity1"];
            $quantity2 = $_POST["quantity2"];
            $quantity3 = $_POST["quantity3"];
            $pdate = $_POST["pdate"];
            $this->model->reqLaundry($type,$pdate, $des, $id, $catw1, $catw2, $catw3, $quantity1, $quantity2, $quantity3);
            // header("Refresh:0; url=laundry");
        }
        $this->view->render('resident/laundryView');
    }

    //make visitor request
    public function visitor()
    {
        $id = $_SESSION['userId'];
        if (isset($_POST["name"]) && isset($_POST["vdate"]) && isset($_POST["description"])) {
            $des = $_POST["description"];
            $vdate = $_POST["vdate"];
            $name = $_POST["name"];
            $this->model->requestVisitor($name, $vdate, $des, $id);
        }
        $this->view->render('resident/visitorView');
    }

    //view all notifications
    public function getNotification()
    {
        $this->view->notification = $this->model->readNotification();
        $this->view->render('resident/notificationView');
    }

    //mark as parcel reached
    public function markReached()
    {
        $nid = $_GET['notification'];
        $this->model->setReached($nid);
        $this->getNotification();
    }

    //mark as notification read
    public function markRead()
    {
        $nid = $_GET['notification'];
        $this->model->removeNotification($nid);
        $this->getNotification();
    }

    //make complaints 
    public function complaint()
    {
        $id = $_SESSION['userId'];
        if (isset($_POST["description"]) && isset($_POST["type"])) {
            $des = $_POST["description"];
            $type = $_POST["type"];
            $result = $this->model->complaint($des, $type, $id);
            if ($result == 0) {
                $this->view->error = true;
            } else {
                $this->view->success = true;
            }
        }
        $this->view->render('resident/complaintView');
    }

    //make payemnts with payhere
    public function makePayment()
    {
        $user =$this->model->readResident();
        $row = $user->fetch_assoc();
        $apartmentNo = $row["apartment_no"];
        $residentId =  $row["resident_id"];
        $residentFname = $row["fname"];
        $residentLname = $row["lname"];
        $amount = $_GET["amt"];
        $paymentDetails = '{"apartmentNo" : "' . $apartmentNo . '" , "residentId" : "' . $residentId . '" , "fname" : "' . $residentFname . '" , "lname" : "' . $residentLname . '" , "amount" : "' . $amount . '"}';
        echo $paymentDetails;
        
        //$this->view->render('resident/paymentView');
    }
    public function payafter(){
        $amount = $_GET["amt"];
        $this->model->paymentSave($amount);
    }
}

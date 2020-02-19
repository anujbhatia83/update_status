<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
// application/controllers/LoginController.class.php
class EmployeeController extends Controller{

    public function loginAction() {
        include  CURR_VIEW_PATH ."login.php";
        exit();
    }

    public function registerAction() {
        include  CURR_VIEW_PATH ."register.php";
        exit();
    }

    public function teamAction($team) {

        
        //define("TEAM_NAME", $team);
        $_SESSION['team_name'] = $team;

        $this->indexAction($_SESSION['team_name']);
        exit;
        

    }

    public function homeAction() {
        $employeeModel = new EmployeeModel('business_solutions');

        $employees = $employeeModel->getEmployees();
        $absentEmployees = $employeeModel->getAbsentEmployees();

        $locations = array(
            'Mac Arthur Avenue',
            'Pandanus Building A',
            'Pandanus Building B',
            'Pandanus Building C',
            'Da Vinci Building',
            'Working from Home',
            'Sick Leave',
            'Annual Leave',
            'Sydney - Bankstown', 
            'Sydney - Richmond',
            'New Zealand - Auckland',
            'New Zealand - Blenheim',
            'AH'
            );
        //print_r($locations); exit;
        
        include  CURR_VIEW_PATH ."home.php";
        exit();
    }

    public function indexAction($team_name){

        
        $employeeModel = new EmployeeModel($team_name);

        $employees = $employeeModel->getEmployees();
        $absentEmployees = $employeeModel->getAbsentEmployees();

        $locations = array(
            'Mac Arthur Avenue',
            'Pandanus Building A',
            'Pandanus Building B',
            'Pandanus Building C',
            'Da Vinci Building',
            'Working from Home',
            'Sick Leave',
            'Annual Leave',
            'Sydney - Bankstown', 
            'Sydney - Richmond',
            'New Zealand - Auckland',
            'New Zealand - Blenheim',
            'AH'
            );
        //print_r($locations); exit;

        include  CURR_VIEW_PATH ."status.php";
		exit();


    }

    public function updateStatusAction() {
        //$this->send_email();
        $statusType = $_POST['status-type'];
        if($statusType == 'leave') {
            $leaveType = $_POST['leave-type']; 

            if($leaveType == 'sick_leave') {
                $subject = "Sick Leave Notification";
                $bodyHtml = '<p>Hi Team,</p>
                            <p>I will be out of office today on sick leave.</p>';
                $status = 0;
                $location = "Sick Leave";
            }

            if($leaveType == 'annual_leave') {
                $subject = "Annual Leave Notification";
                $bodyHtml = '<p>Hi Team,</p>
                            <p>I will be out of office today on annual leave.</p>';
                $status = 0;
                $location = "Annual Leave";

            }
            
        } 
        if($statusType == 'out_of_office') {
            $outOfofficeType = $_POST['out-type']; 

            if($outOfofficeType == 'training') {
                $subject = "Out of Office Notification";
                $bodyHtml = '<p>Hi Team,</p>
                            <p>I will be out of office today due to training.</p>';
                $status = 0;
                $location = "Training";

            } 

            if($outOfofficeType == 'airbus_office') {
                $subject = "Out of Office Notification";
                $bodyHtml = '<p>Hi Team,</p>
                            <p>I will be out of office at Pandanus Avenue.</p>';
                $status = 1;
                $location = "Another Airbus Office";

            }   
        }
        $employeeModel = new EmployeeModel('business_solutions');

        $employeeModel->updateStatus($_POST['empID'], $status, $location);
        
        $this->send_email($subject, $bodyHtml);
        $this->homeAction();
        exit;

        /*ini_set('SMTP','localhost');
        ini_set('smtp_port',25);

        $to = "anuj.bhatia@airbus.com";
        $subject = "Sick Leave";
        $txt = "Hello Team!";
        $headers = "From: shilpikasingh.bhadu@airbus.com";

        mail($to,$subject,$txt,$headers);*/
        
    }

    public function updateEmpStatusAction() {

        $employeeModel = new EmployeeModel('business_solutions');

        $employeeModel->updateStatus($_POST['id'], $_POST['status'], $_POST['location']);
    }

    public function send_email($subject, $bodyHtml) {
        // If necessary, modify the path in the require statement below to refer to the
        // location of your Composer autoload.php file.
        require 'vendor/autoload.php';
        // Import PHPMailer classes into the global namespace
        // These must be at the top of your script, not inside a function
        // Replace sender@example.com with your "From" address.
        // This address must be verified with Amazon SES.
        $sender = 'anuj_bhatia83@yahoo.com';
        $senderName = 'Anuj Bhatia';

        // Replace recipient@example.com with a "To" address. If your account
        // is still in the sandbox, this address must be verified.
        $recipient = 'anuj.bhatia@airbus.com';

        // Replace smtp_username with your Amazon SES SMTP user name.
        $usernameSmtp = 'AKIAXS2QA7GWQYG6DC3Q';

        // Replace smtp_password with your Amazon SES SMTP password.
        $passwordSmtp = 'BHeBIjkI/HRgUyG//8pEm2jTXR5ecI8ur/zahmyNtYR/';

        // Specify a configuration set. If you do not want to use a configuration
        // set, comment or remove the next line.
        //$configurationSet = 'ConfigSet';

        // If you're using Amazon SES in a region other than US West (Oregon),
        // replace email-smtp.us-west-2.amazonaws.com with the Amazon SES SMTP
        // endpoint in the appropriate region.
        $host = 'email-smtp.us-east-1.amazonaws.com';
        $port = 587;

        // The subject line of the email
        //$subject = 'Sick Leave Notification';

        // The plain-text body of the email
        //$bodyText =  "Sick Leave Notification ";

        // The HTML-formatted body of the email
        //$bodyHtml = 'This email is to notify that ';

        $mail = new PHPMailer(true);

        try {
            // Specify the SMTP settings.
            $mail->isSMTP();
            //$mail->SMTPDebug = 2;
            $mail->setFrom($sender, $senderName);
            $mail->Username   = $usernameSmtp;
            $mail->Password   = $passwordSmtp;
            $mail->Host       = $host;
            $mail->Port       = $port;
            $mail->SMTPAuth   = true;
            $mail->SMTPSecure = 'tls';
            //$mail->addCustomHeader('X-SES-CONFIGURATION-SET', $configurationSet);

            // Specify the message recipients.
            $mail->addAddress($recipient);
            // You can also add CC, BCC, and additional To recipients here.

            // Specify the content of the message.
            $mail->isHTML(true);
            $mail->Subject    = $subject;
            $mail->Body       = $bodyHtml;
            //$mail->AltBody    = $bodyText;
            $mail->Send();
            echo "Email sent!" , PHP_EOL;
        } catch (phpmailerException $e) {
            echo "An error occurred. {$e->errorMessage()}", PHP_EOL; //Catch errors from PHPMailer.
        } catch (Exception $e) {
            echo "Email not sent. {$mail->ErrorInfo}", PHP_EOL; //Catch errors from Amazon SES.
        }

    }

    public function updateEmployeeAction() {


    		$id = $_POST['id'];
            $location = $_POST['location'];
            $status = ($_POST['status'] == "off" ? 1 : 0);
            $all_day = ($_POST['all_day'] == "yes" ? 1 : 0);
            $date_in = date('Y-m-d', strtotime( str_replace('/', '-', $_POST['date_in'])));
            $date_out = date('Y-m-d', strtotime( str_replace('/', '-', $_POST['date_out'])));

            // echo $date_in; exit;

			$employeeModel = new EmployeeModel($_SESSION['team_name']);
			$updated = $employeeModel->updateEmployee($id, $location, $status, $all_day, $date_in, $date_out);

            if($location == 'Mac Arthur Avenue' || $location == 'Pandanus Building A' || $location == 'Da Vinci Building' || $location == 'Pandanus Building B' || $location == 'Pandanus Building C' ){
                $deleted = $employeeModel->resetDates($id);
                }            

            header("Location:index.php?c=Employee&a=team&team_name=".$_SESSION['team_name']); die;
            exit();

		// 	if($updated) {
		// 		$result = array('updated' => 'Y');	
		// 	} else {
		// 		$result = array('updated' => 'N');	
		// 	}

  //   	header('Content-Type: application/json');
		// die (json_encode($result));
	}

}
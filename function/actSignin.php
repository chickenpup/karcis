<?php
    include "../conn.php";
    error_reporting(E_ALL);
    date_default_timezone_set("Asia/Jakarta");
    $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/"; 
    $email = @$_POST['email'];
    $password_plain = @$_POST['password'];
    // $password = sha1(@$_POST['password']);
    if(strlen(@$_POST['email']) == 0) {
        header('Location: '.$host.'signin.php?status=null' );
    }
    elseif(strlen($password_plain) == 0) {
        header('Location: '.$host.'signin.php?status=null' );
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: '.$host.'signin.php?status=email' );
    }
    // elseif(!preg_match($password_regex, $password_plain)) {
    //     header('Location: '.$host.'signin.php?status=pass' );
    // }
    else {
        
        $sql = "SELECT attemps, created FROM users_login_attemps a, users_log b where a.email = ? AND a.email=b.email AND attemps>=3 ORDER BY created DESC LIMIT 1";

        $stmt = $conn->prepare( $sql );
        $stmt->bind_param( "s", $email );
        $stmt->execute();
        $attemps = $stmt->get_result(); // get the mysqli result
        $row_attemps = $attemps->fetch_assoc();
        if( $row_attemps ) {
            $date= $row_attemps['created'];
            // $start_date = new DateTime( $row_attemps['çreated'] );
            // $since_start = $start_date->diff(new DateTime( date( 'Y-m-d H:i:s' )));
    
            $start_date = DateTime::createFromFormat( 'Y-m-d H:i:s', $date ) ;
            $end_date = date_create( date( 'Y-m-d H:i:s' ));
            $since_start = date_diff( $start_date, $end_date );    
            if( $since_start->m <=2 ) {
                login_attemps( $email, 1 );
                log_user( $email );
                $stmt->close();
                $conn->close();
        
                header('Location: '.$host.'signin.php?status=locked' );
            }
        }
        // echo '<pre>';
        // print_r( $start_date);
        // print_r( $end_date );
        // print_r($since_start); die; 

        // else {
            $sql = "SELECT email, password, fullname, id FROM users a, user_profile b where email=? AND a.id=b.id_user";

            // $2y$10$nsPD2uX4Mt7F0Cgj/FBeV.wlOP/1zoNWsi1BDI/W7zhFRf2MVzarW
            $stmt = $conn->prepare( $sql );
            $stmt->bind_param( "s", $email );
            $stmt->execute();
            $result = $stmt->get_result(); // get the mysqli result
            $row = $result->fetch_assoc();
    
            if( $row ) {
// echo $row['password'];die;
                if( password_verify( $password_plain, $row['password'] )) {
                    login_attemps( $email, 0 );
                    log_user( $email );
                    // output data of each row
                    session_start();
                    @$_SESSION["id"] = $row['id'];
                    @$_SESSION["fullname"] = $row['fullname'];
                    @$_SESSION['tipe'] = 'users';
                    $stmt->close();
                    $conn->close();
                    // print_r($_SESSION);die;
                    header('Location: '.$host.'profile.php');
                }
                else {
                    login_attemps( $email, 1 );
                    log_user( $email );            
                    header('Location: '.$host.'signin.php?status=failed' );
                }
            }    
            else {
                login_attemps( $email, 1 );
                log_user( $email );
                header('Location: '.$host.'signin.php?status=failed' );
            }
        // }
    }


    function login_attemps( $email, $attemps ) {
        include "../conn.php";

        $sql = "SELECT email FROM users_login_attemps WHERE email=?";
        $stmt = $conn->prepare( $sql );
        $stmt->bind_param( "s", $email );
        $stmt->execute();
        $result = $stmt->get_result(); // get the mysqli result
        $row = $result->fetch_assoc();

        if( $row ) {
            if( $attemps === 0 )
                $sql = "UPDATE users_login_attemps SET email=?, attemps=0";
            else 
                $sql = "UPDATE users_login_attemps SET email=?, attemps=attemps+1";

// echo $sql; die;
            $stmt = $conn->prepare( $sql );
            $stmt->bind_param( "s", $email );
            $stmt->execute();

        }
        else {
            $sql = "INSERT INTO users_login_attemps( email, attemps ) VALUES( ?, ? )";
            $stmt = $conn->prepare( $sql );
            $stmt->bind_param( "s", $email );
            $stmt->execute();
        }
        
        $stmt->close();
        $conn->close();
    }

    function log_user( $email ) {
        include "../conn.php";
        
        $sql = "INSERT INTO users_log (email, status) VALUES( ?, 0 )";
        $stmt = $conn->prepare( $sql );
        $stmt->bind_param( "s", $email );
        $stmt->execute();
        $stmt->close();
        $conn->close();
    } 

?>
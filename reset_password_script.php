<?php
    $haslo_temp = "Try1234!";
    $email = $_GET['email_'];
    require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'db.php';
    require dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'm.php';
	require '/usr/share/php/libphp-phpmailer/class.phpmailer.php';
	require '/usr/share/php/libphp-phpmailer/class.smtp.php';

    $mysqli = new mysqli(DBhost, DBuser, DBpass, DBname, DBport);
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }
    $sql = "SELECT email, haslo FROM uzytkownik WHERE email='{$email}'";
    $result = $mysqli->query($sql);
    if($result->num_rows === 0)
    {
        echo 'No result';
    }
    else
    {
        if ($row = $result->fetch_assoc()) {
            echo "row" . $row["email"];
        }
        $result -> free_result();
        if ($email == $row["email"])
        {
            $haslo_temp = strval(rand(100000,999999));
            $sql_up = "UPDATE uzytkownik SET haslo = '{$haslo_temp}' WHERE email = '{$email}'";
            //UPDATE table_name SET column1 = value1, column2 = value2 WHERE id=100;
            if($mysqli->query($sql_up))
            {
                // mail
                $mail = new PHPMailer;
                $mail->setFrom(muser);
                $mail->addAddress($email);
                $mail->Subject = 'Clocker - reset hasla';
                $mail->Body = "Twoje haslo tymczasowe to: {$haslo_temp}";
                $mail->IsSMTP();
                $mail->SMTPSecure = 'ssl';
                $mail->Host = 'ssl://poczta.interia.pl';
                $mail->SMTPAuth = true;
                $mail->Port = 465;
                $mail->Username = muser;
                $mail->Password = mpass;
                if(!$mail->send()) {
                    echo 'Email is not sent.';
                    $ans = "Blad podczas wysyłania hasła na pocztę email.";
                    echo 'Email error: ' . $mail->ErrorInfo;
                } else {
                    echo 'Email has been sent.';
                    $ans = "Zresetowano hasło. Sprawdz pocztę email.";
                }
            }
        } 
    }               
    $mysqli -> close();
    if(file_exists("login.php")) 
    {
        header("Location: https://time.tea-it.pl/login.php?ans={$ans}");
        exit;
    }
?>

<?php 
    
    use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

  //print_r($_POST);

    class Mensagem {
        private $email = null;
        private $nome = null;
        private $mensagem = null;
        public $status = array( 'codigo_status' => null, 'descricao_status' => '');

        public function __get($atributo) {
			return $this->$atributo;
		}

		public function __set($atributo, $valor) {
			$this->$atributo = $valor;
		}

		public function mensagemValida() {
            if(empty($this->email) || empty($this->nome ) || empty($this->mensagem)) {
                return false;
            }
                return true;
            }

        } 
            

    $mensagem = new Mensagem();

    $mensagem->__set('email', $_POST['email']);
    $mensagem->__set('nome', $_POST['nome']);
    $mensagem->__set('mensagem', $_POST['mensagem']);

    if(!$mensagem->mensagemValida()) {
       header('location: contato.html?1');
       die();
    } 

    $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = false;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = '';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'teste@teste.com';                 // SMTP username
            $mail->Password = 'teste';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('carvalhorocha2911@gmail.com',  $mensagem->__get('nome'));
            $mail->addAddress('felipecarvalho2911@gmail.com');     // Add a recipient
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->SMTPOptions = array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ));


            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $mensagem->__get('email');
            $mail->Body    = $mensagem->__get('mensagem');
            $mail->AltBody = 'É necessário utilizar um client que suporte HTML para ter acesso total ao conteúdo dessa mensagem';

            $mail->send();

            $mensagem->status['codigo_status'] = 1;
            $mensagem->status['descricao_status'] = 'E-mail enviado com sucesso';
            header('location: contato.html?2');
        
        } catch (Exception $e) {

            $mensagem->status['codigo_status'] = 2;
            $mensagem->status['descricao_status'] = 'Não foi possível enviar este e-mail! Por favor tente novamente mais tarde. Detalhes do erro: ' . $mail->ErrorInfo;
            header('location: contato.html?3');

        }
        //print_r($mensagem);

?>
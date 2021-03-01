
<?php
extract($_REQUEST);
function sentEmail($e='dunvph10007@fpt.edu.vn', $pass='', $cus="phuongddph10045@fpt.edu.vn", $mail ='ok heets nha', $phone ='097659407', $content='',$name=''){
    //1. Key dưới đây chỉ dùng tạm, khi chạy dịch vụ chính thức bạn cần đăng ký tài khoản của sendgrid.com
    // website nhỏ thì dùng tài khoản miễn phí ok
    // tham khảo cách đăng ký để lấy key https://saophaixoan.net/search-tut?q=sendgrid
    // trong code này chỉ cần lấy key là ok, sau khi gửi thử xong thì verify là ok.
    $SENDGRID_API_KEY='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';

    // require '../../content/vendor/autoload.php';
    require'./vendor/autoload.php';
    $email = new \SendGrid\Mail\Mail(); 
    ///------- bạn chỉnh sửa các thông tin dưới đây cho phù hợp với mục đích cá nhân
    // Thông tin người gửi
    $email->setFrom($e, "du040995");
    // Tiêu đề thư
    $email->setSubject("Sending with SendGrid is Fun");
    // Thông tin người nhận
    $email->addTo($cus, "du040995");
    // Soạn nội dung cho thư
    // $email->addContent("text/plain", "Nội dung text thuần không có thẻ html");
    $email->addContent(
        "text/html", "<h2>$pass</h2>" . "<h2>Ymail: $mail</h2>" . "<h2>Số điện thoại: $phone</h2>" ."<h2>name: $name</h2>"."<h2>Nội dung: $content</h2>"
    );

    // tiến hành gửi thư
    $sendgrid = new \SendGrid($SENDGRID_API_KEY);
    try {
        $response = $sendgrid->send($email);

    } catch (Exception $e) {
        echo 'Email không tồn tại' ."\n";
    }

}


if (isset($_POST["btn_sent"])) {
    extract($_REQUEST);
    sentEmail('dunvph10007@fpt.edu.vn', '', 'phuongddph10045@fpt.edu.vn', '', '', '',$name);

}
?>
 <form action="" method="post">
            <div class="form-group">
                <label>Họ và tên</label>
                <span><?=isset($err[0])?$err[0]:''?></span>
                <input value="<?=isset($name)?$name:''?>" type="text" class="form-control" name="name">
            </div>

           

            <div style="text-align:center" class="form-group">
                <button class="btn btn-info" type="submit" name="btn_sent">Gửi phản hồi</button>
                <!-- <a class="btn btn-primary" href="index.php">Quay về trang chủ</a> -->
            </div>
        </form>
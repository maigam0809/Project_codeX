<?php
    if(isset($data['message'])){
        $message = $data['message'];
    }
?>

<li class="breadcrumb-item active cl-control" aria-current="page">Liên hệ</li>
            </nav>
        </div>
    </section>

    
    <div class="content content_contact">
        <div class="container col-12">
        <?php if(!empty($message)){ ?>
    <div class="alert-danger alert">           
                <li><?php
        echo $message;
        ?></li>
          
        </div>
    <?php } ?>
            <div class="row">
                <div class="bg_content_contact">
                    <div class="select_maps sec_footer col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="map_h">
                            <div class="page_contact">
                                <h1 class="title_db">
                                    <span>Liên hệ với chúng tôi</span>
                                </h1>
                            </div>
                            <div class="list_menu">
                                <div class="widget_db">
                                    <div class="item">
                                        <ul class="contact contact_x">
                                            <b class="title_bold">Cửa hàng chính:</b>
                                            <li>
                                                <i class="fa fa-map-marker"></i>
                                                <span class="txt_content_child">
                                                    Số 23/71 Đường Mỹ Đình, Quận Nam Tù Niêm ,Thành Phố Hà Nội
                                                </span>
                                            </li>
                                            <li class="sdt">
                                                <i class="fa fa-mobile"></i>
                                                <span class="txt_content_child">
                                                  Điện Thoại
                                                </span>
                                                <a href="">0344358618</a>
                                            </li>
                                            <li>
                                                <i class="fa fa-envelope"></i>
                                                <span class="txt_content_child">
                                                    Email:
                                                </span>
                                                <a href="">maigam08092000@gmail.com</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="page-login page_contact">
                                <div class="title-head-contact a-left">
                                    <span>Gửi Liên hệ</span>
                                </div>
                                <div id="pagelogin">
                                    <form action="" method="post" >

                                        <div class="form-signup clearfix">
                                            <div class="row group_contact">
                                            <input type="hidden" class="form-control" name="contact_create_at" id="created_at" value="<?= date("Y-m-d", time()); ?>">
                                                <fieldset class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <input type="text" placeholder="Họ và tên" name="name" class="form-control  form-control-lg" required="">
                                                </fieldset>
                                                <fieldset class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <input type="text" placeholder="Email" name="email" class="form-control  form-control-lg" required="">
                                                </fieldset>
                                                <fieldset class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <textarea placeholder="Lời nhắn" name="contact" id="loinhan" class="form-control content-area form-control-lg" rows="2" required=""></textarea>
                                                </fieldset>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-button">
                                                    <button type="submit" class="btn btn-primary btn-lienhe" name="btn_email">Gửi liên hệ</button>
                                                </div>
                                            </div>

                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="select_maps sec_footer col-lg-6 col-md-6 col-sm-12 col-xs-12 right_contact">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.1373202472373!2d105.77297221424524!3d21.027190793209357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b1eec75f8d%3A0xaabda7549065fb73!2zVHLGsOG7nW5nIG3huqdtIG5vbiBN4bu5IMSQw6xuaCAy!5e0!3m2!1svi!2s!4v1605431715983!5m2!1svi!2s "
                            width="100%" height="450 " frameborder="0 " style="border:0; " allowfullscreen=" " aria-hidden="false " tabindex="0 "></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
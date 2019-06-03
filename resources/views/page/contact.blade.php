@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Contacts</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="index.html">Home</a> / <span>Contacts</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="beta-map">
    <div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.2299074780726!2d106.80136461474979!3d10.870110392257981!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527587e9ad5bf%3A0xafa66f9c8be3c91!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgVGjDtG5nIHRpbiDEkEhRRyBUUC5IQ00!5e0!3m2!1svi!2s!4v1555927616121!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
</div>
<div class="container">
    <div id="content" class="space-top-none">

        <div class="space50">&nbsp;</div>
        <div class="row">
            <div class="col-sm-8">
                <h3>Mọi thắc mắc quý khách có thể gửi về theo mẫu dưới</h3>
                <h3>Hoặc gửi về địa chỉ Email: tanvlog@gmail.com</h3>
                <div class="space20">&nbsp;</div>
                <p>Tân ngáo đá xin hỗ trợ nhiệt tình!!!</p>
                <div class="space20">&nbsp;</div>
                <form action="#" method="post" class="contact-form">
                    <div class="form-block">
                        <input name="your-name" type="text" placeholder="Họ tên (bắt buộc)">
                    </div>
                    <div class="form-block">
                        <input name="your-email" type="email" placeholder="Email (Bắt buộc)">
                    </div>
                    <div class="form-block">
                        <input name="your-subject" type="text" placeholder="Tiêu đề">
                    </div>
                    <div class="form-block">
                        <textarea name="your-message" placeholder="Thắc mắc và phản hồi của bạn"></textarea>
                    </div>
                    <div class="form-block">
                        <button type="submit" class="beta-btn primary">Gửi yêu cầu cho Tân Vlog<i class="fa fa-chevron-right"></i></button>
                    </div>
                </form>
            </div>
            <div class="col-sm-4">
                <h2>Thông tin liên lạc</h2>
                <div class="space20">&nbsp;</div>

                <h6 class="contact-title">Địa chỉ</h6>
                <p>
                    Khu phố 6 - P.Linh Trung,<br>
                    Q.Thủ Đức<br>
                    HCMC
                </p>
                <div class="space20">&nbsp;</div>
                <h6 class="contact-title">Thắc mắc về Độ Trẩu liên hệ</h6>
                <p>
                   Đại Đẹp Trai. <br>
                    <a href="mailto:biz@betadesign.com">dxdspirit123@gmail.com</a>
                </p>
                <div class="space20">&nbsp;</div>
                <h6 class="contact-title">Kênh Tân Vlog</h6>
                <p>
                    Tân Ngáo Đá Vê Lốc<br>
                    Khu AG4 - KTX A - DHQG -HCMC<br>
                    <a href="https://www.youtube.com/channel/UCVEa49SSGKMXv1JrcEoEx_A">Tân Vlog</a>
                </p>
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
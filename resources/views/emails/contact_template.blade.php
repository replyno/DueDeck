<!DOCTYPE html>
<html>
<head>
<title></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family:"noto sans", sans-serif;
}
.icon1{
  width: 20px;
  margin-right: 12px;
}
td{
  padding: 3px;
}
p,th,td{
  font-size: 12px;
}
article {
  padding-top:10px!important;
  padding: 15px;
  width: 100%;

}
ol,li{
  font-size: 12px;
}
footer {
  height: 20%;
}

@media (min-device-width: 600px) {
  article {
    width: 100%;
    height: auto;
  }
  section{
    width: 60%!important;
    padding: 12px!important;
    margin: 0 auto!important;
    background: #fff!important;
    border-radius: 3px!important;
  }

}
@media (max-device-width: 600px) {
  section{
    padding: 12px!important;
    margin: 0 auto!important;
    background: #fff!important;
    border-radius: 3px!important;
  }
}
</style>
</head>
<body style="background: #d3e6ed;
    padding: 15px;">
<section class="div-align">
<header style="
    background-size: contain;
    background-image: url('<?php echo config('constants.DEFAULT_URL');?>/public/image/eligo_watermark.png');
    background-repeat: no-repeat;
    background-position: center;
    border: 10px #cccccc solid;">
            <article>
                <p>Dear <b>ELIGO APPTECH PVT. LTD.</b>,<br>
                    <br>
                        New customer enquiry.
                </p>

                <table style=''>

                    <tr>
                        <td style="font-weight: 600;">Name  </td>
                        <td>: </td>
                        <td><?php echo $details['name']; ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: 600;">Email</td>
                        <td>: </td>
                        <td><?php echo $details['email']; ?></td>
                    </tr>

                    <tr>
                        <td style="font-weight: 600;">Contact No</td>
                        <td>: </td>
                        <td><?php echo $details['contact_no']; ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: 600;">IP ADDRESS</td>
                        <td>: </td>
                        <td><?php echo $details['ip_address']; ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: 600;">Maessage</td>
                        <td>: </td>
                        <td><?php echo $details['message']; ?></td>
                    </tr>

                </table>
            </article>
            </header>

<footer >
  <table style="width: 100%">
            <tr>
                <td style="padding: 20px 10px;width: 100%;font-size: 12px; font-family: sans-serif; mso-height-rule: exactly; line-height:18px; text-align: center; color: #111111;"><a href="<?php echo config('constants.DEFAULT_URL');?>" style="color:#cccccc; text-decoration:underline; font-weight: bold;">View as a Web Page</a>
                <br>
                <p class="text-sm">Thanks & Regards,<br>
                    Team DueDeck</p>
                   <a href="http://duedeck.com/contact" style="color: #0789B5;"> Contact Us</a>

                <p style="text-align: justify;opacity: 0.5;">This is an auto generated email. This email message is for the sole use of the intended recipient(s) and may contain confidential information. Any unauthorized review, use, disclosure or distribution is prohibited. If you are not the intended recipient, please contact the sender by reply email and destroy all copies of the original message.</p>

                </td>
              </tr>

          </table>
</footer>
</section>
</body>
</html>


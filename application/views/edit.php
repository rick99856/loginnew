<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<html>
<body background="image/fresh-green-background.jpg" style="background-repeat: no-repeat;background-size:cover;">
                                        
<div class="row">
<div class="col-md-3 col-md-offset-4" >
        <form name="form1" method="post" action="edit_fin">
       
        <span style="font-family:Microsoft JhengHei;font-size:18px;" >密碼：</span><input type="password" name="pw" value="<?php echo $passwd; ?>" class="form-control"/> <br>
        <span style="font-family:Microsoft JhengHei;font-size:18px;" >再一次輸入密碼：</span><input type="password" name="pw2" value="" class="form-control"/> <br>
        <span style="font-family:Microsoft JhengHei;font-size:18px;" >電話：</span><input type="text" name="telephone" value="<?php echo $tel; ?>" class="form-control"/> <br>
        <span style="font-family:Microsoft JhengHei;font-size:18px;" >地址：</span><input type="text" name="address" value="<?php echo $adds; ?>" class="form-control"/> <br>
        <span style="font-family:Microsoft JhengHei;font-size:18px;" >備註：</span><textarea name="other" cols="45" rows="5" class="form-control"><?php echo $other; ?></textarea> <br>
        <span style="font-family:Microsoft JhengHei;font-size:18px;" >信箱：</span><input type="text" name="email" value="<?php echo $email; ?>" class="form-control"/> <br>
        <input type="submit" name="button" class="btn btn-success btn-lg btn-block" value="確定" />
        </form>
</div>
</div>

                                        
</body>
</html>
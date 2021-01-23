<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>使用者登入</title>
</head>
<style>
    .container-fluid {
        width: 30%;
        position: absolute;
        top: 50px;
        right: 0;
        bottom: 0;
        left: 0;
        margin: auto;
    }
</style>

<body>


    <div class="container-fluid">
        <?php require_once('./loginVadation.php');?>
        <div class="card">
            <div class="card-header" style="text-align:center;">
                使用者登入
            </div>
            <div class="card-body">
                <form action=" <?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="row" style="margin-bottom:5px;">
                        <label for="account" class="col-3 col-form-label">帳號</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="account">
                        </div>
                    </div>
                    <div class="row">
                        <label for="inputPassword" class="col-3 col-form-label">密碼</label>
                        <div class="col-9">
                            <input type="password" class="form-control" id="inputPassword">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-sm">登入</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

</html>
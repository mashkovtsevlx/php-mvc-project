<div class="container">

    <h1>PHP MVC Site</h1>

    <div class="row">
        <div class="col-12">
            <div class="dropdown sort-dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sort By
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/?id=1&order=name">Name</a>
                    <a class="dropdown-item" href="/?id=1&order=email">Email</a>
                    <a class="dropdown-item" href="/?id=1&order=status">Status</a>
                </div>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#newTask">Create task</button>
                <?php
                    if ( $_SESSION['admin'] == "123" )
                    {
                        echo '<a class="btn btn-warning" href="/main/logout" role="button">Log Out</a>';
                    }
                    else
                    {
                        echo '<button type="button" class="btn btn-success" data-toggle="modal" data-target="#logIn">Log In</button>';
                    }
                ?>
                <div class="modal fade" id="logIn">
                    <div class="modal-dialog">
                        <div class="modal-content">

                        <div class="modal-header">
                            <h4 class="modal-title">Log In</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">
                            <form action="/main/login" method="post" accept-charset="UTF-8">
                                <div class="form-group">
                                    <label for="form-login">Username</label>
                                    <input type="text" class="form-control" id="form-login" placeholder="" name="login">
                                </div>
                                <div class="form-group">
                                    <label for="form-password">Password</label>
                                    <input type="password" class="form-control" id="form-password" placeholder="" name="password">
                                </div>
                                <button type="submit" class="btn btn-primary">Log In</button>
                            </form>
                        </div>

                        </div>
                    </div>
                </div>
                <!--<div class="modal fade" id="newTask">
                    <div class="modal-dialog">
                        <div class="modal-content">

                        <div class="modal-header">
                            <h4 class="modal-title">New Task</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">
                            <form action="/main/new" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="form-name">Name</label>
                                    <input type="text" class="form-control" id="form-name" placeholder="Alex" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="form-email">Email</label>
                                    <input type="email" class="form-control" id="form-email" placeholder="alexander@gmail.com" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="form-text">Text</label>
                                    <textarea class="form-control" id="form-text" rows="3" name="text"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="form-image">Picture</label>
                                    <input type="file" class="form-control-file" id="form-image" aria-describedby="fileHelp" name="userfile">
                                    <small id="fileHelp" class="form-text text-muted">Not more than 320х240 pixels</small>
                                </div>
                                <button type="button" class="btn btn-success" onclick="previewChange(this)" data-toggle="modal" data-target="#taskPreview">Preivew</button>
                                <button type="submit" class="btn btn-primary">Send</button>
                            </form>
                        </div>

                        </div>
                    </div>
                </div>-->
                <div class="modal fade" id="newTask">
                    <div class="modal-dialog">
                        <div class="modal-content">

                        <div class="modal-header">
                            <h4 class="modal-title">Card info</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">
                            <form action="/main/new" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="form-name">Card Name</label>
                                    <input type="text" class="form-control" id="form-name" placeholder="Tag a friend" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="form-email">Card Description</label>
                                    <input type="email" class="form-control" id="form-email" placeholder="in facebook" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Card access code</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Code">
                                </div>
                                <div class="form-group">
                                    <label for="form-text">Card Text</label>
                                    <textarea class="form-control" id="form-text" rows="3" name="text"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="form-select">Enabled</label>
                                    <select class="custom-select" id="form-select" style="margin-left: 40px">
                                        <option value="9" selected>Yes</option>
                                        <option value="1">No</option>
                                    </select>
                                    <label for="form-check" style="margin-left: 110px">Send info on email</label>
                                    <input class="form-check-input" type="checkbox" id="form-check" value="" style="margin-left:38px; margin-top: 11px">
                                </div>
                                <div class="form-group">
                                    <label for="form-image">Card Picture</label>
                                    <input type="file" class="form-control-file" id="form-image" aria-describedby="fileHelp" name="userfile">
                                    <small id="fileHelp" class="form-text text-muted">Not more than 320х240 pixels</small>
                                </div>
                                <button type="button" class="btn btn-success" onclick="previewChange(this)" data-toggle="modal" data-target="#taskPreview">Preivew</button>
                                <button type="submit" class="btn btn-primary">Send</button>
                            </form>
                        </div>

                        </div>
                    </div>
                </div>
                <div class="modal fade" id="taskPreview">
                    <div class="modal-dialog">
                        <div class="modal-content">

                        <div class="modal-header">
                            <h4 class="modal-title">Preview</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">

                            <div class="col-12 task-card">
                                <div class="card" id="card-id-preview" style="width: 100%;">
                                    <img class="card-img-top" id="previewImg" src="/images/uploads/default.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"></h5>
                                        <h6 class="card-subtitle mb-2 text-muted"></h6>
                                        <p class="card-text" onclick="cardClick(this)"></p>
                                        <div class="alert alert-warning" onmouseover="statusBlink(this)" onmouseout="statusBlink(this)" onclick="statusClick(this)" role="alert">
                                            Not done
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
    <?php
        foreach($page['cards'] as $row)
        {
            echo '
            <div class="col-4 task-card">
                <div class="card" id="card-id-'.$row['id'].'" style="width: 100%;">
                    <img class="card-img-top" src="/images/uploads/'.$row['img'].'" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">'.$row['name'].'</h5>
                        <h6 class="card-subtitle mb-2 text-muted">'.$row['email'].'</h6>
                        <p class="card-text" onclick="cardClick(this)">'.$row['text'].'</p>';
            
            if ($row['status'] == 0)
            {
                echo '
                <div class="alert alert-warning" onmouseover="statusBlink(this)" onmouseout="statusBlink(this)" onclick="statusClick(this)" role="alert">
                    Not done
                </div>
                ';
            }
            else
            {
                echo '
                <div class="alert alert-success" onmouseover="statusBlink(this)" onmouseout="statusBlink(this)" onclick="statusClick(this)" role="alert">
                    Done
                </div>
                ';
            }
            
            echo '
                    </div>
                </div>
            </div>
            ';
        }
    ?>
    </div>
    <div class="row">
        <nav aria-label="Navigation" id="cards-pagination">
            <ul class="pagination justify-content-center">
                <?php
                    if(isset($_GET['order']))
                    {
                        $order = $_GET['order'];
                    }
                    else
                    {
                        $order = 'name';
                    }
                    for ($i = 1; $i <= ceil($page['qty'] / 3); $i++)
                    {
                        echo '<li class="page-item"><a class="page-link" href="/?id='.$i.'&order='.$order.'">'.$i.'</a></li>';
                    }
                ?>
            </ul>
        </nav>
    </div>
</div> <!-- /container -->

<script type="text/javascript">
    function previewChange(obj)
    {
        $("#card-id-preview .card-title").html($('#form-name').val());
        $("#card-id-preview .card-subtitle").html($('#form-email').val());
        $("#card-id-preview .card-text").html($('#form-text').val());
    }
    $('#form-image').change(function () {
        var input = $(this)[0];
        if (input.files && input.files[0]) {
            if (input.files[0].type.match('image/*')) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#previewImg').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
            else
            {
                alert("fuck");
            }
        }
    });
    var observer = new MutationObserver(function(mutations) {
    mutations.forEach(function(mutationRecord) {
            
        });    
    });
    var target = document.getElementById('taskPreview');
    observer.observe(target, { attributes : true, attributeFilter : ['style'] });
</script>

<?php
if ( $_SESSION['admin'] == "123" )
{
?>
    <script type="text/javascript">
        function statusBlink(obj)
        {
            if ($(obj).hasClass('alert-warning'))
            {
                $(obj).removeClass('alert-warning');
                $(obj).addClass('alert-success');
                $(obj).html('Not done');
            }
            else
            {
                $(obj).removeClass('alert-success');
                $(obj).addClass('alert-warning');
                $(obj).html('Done');
            }
        }
        function statusClick(obj)
        {
            if ($(obj).hasClass('alert-warning'))
            {
                status = 0;
                $(obj).removeClass('alert-warning');
                $(obj).addClass('alert-success');
                $(obj).html('Done');
            }
            else
            {
                status = 1;
                $(obj).removeClass('alert-success');
                $(obj).addClass('alert-warning');
                $(obj).html('Not done');
            }
            var dat = 
            {
                "status": status,
                "cardid": $(obj).parents(':eq(1)').attr('id')
            }
            $.ajax({
                type: "POST",
                url: "/main/update_status",
                dataType: 'json',
                data: dat,
                async: true
            });
        }
        function cardClick(obj)
        {
            if (!($(obj).hasClass('card-text-active')))
            {
                $(obj).addClass('card-text-active');
                $(obj).html('<textarea class="form-control">'+$(obj).html()+'</textarea>');
                var div = $(obj).children();
                $(document).keypress(function (e) {
                    if (e.which == 13) {
                        var dat = 
                        {
                            "cardtext": div.val(),
                            "cardid": $(obj).parents(':eq(1)').attr('id')
                        }
                        $.ajax({
                            type: "POST",
                            url: "/main/update_text",
                            dataType: 'json',
                            data: dat,
                            async: true
                        });
                        $(obj).removeClass('card-text-active');
                        div.parent().html(div.val());
                    }
                });
            }
        }
    </script>
<?php
}
?>

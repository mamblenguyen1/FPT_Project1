<?php include './Admin/componant/header.php' ?>

<?php include './admin/componant/sidebar.php' ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <h1 style="padding-left: 30px;">Danh sách thư liên hệ</h1>
        </div>
        <div class="container-fluid" style="padding:30px">
            <div class="card card-primary card-outline">

                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="table-responsive mailbox-messages">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Tên người gửi</th>
                                    <th>Chủ đề</th>
                                    <th>Thời gian</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?
                                $sql = $contact->show_all_contact();
                                foreach ($sql as $row) {
                                    extract($sql);
                                    echo '
                                        <tr>
                                    <td class="mailbox-name">' . $row['name'] . '</td>
                                    <td class="mailbox-subject">' . $row['subject'] . ' </td>
                                    <td class="mailbox-date">' . $timecount->timecount($row['date']) . '</td>
                                    <td width="330">
                                        <form action="index.php?pages=admin&action=ContactDetail" method="post">
                                            <input type="hidden" value="' . $row['contact_id'] . '" name="contact_id">
                                            <button type="submit" name="details" class="btn  btn-outline-primary">Xem nội dung</button>
                                            <button type="submit" name="spam" class="btn btn-danger">Chuyển đến hòm thư Spam</button>
                                        </form>
                                    </td>
                                    </tr>
                                        ';
                                }

                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
</div>



<?php include './admin/componant/footer.php' ?>
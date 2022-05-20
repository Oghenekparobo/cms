<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>id</td>
                                <td>username</td>
                                <td>firstname</td>
                                <td>lastname</td>
                                <td>email</td>
                                <td>image</td>
                                <td>role</td>
                                <td>Admin</td>
                                <td>Subscriber</td>
                                <td>edit</td>
                                <td>delete</td>
                                <td>date</td>
                            </tr>
                        </thead>
                        <tbody>
                          <?php  displayUsers() ?>
                          <?php  deleteUsers() ?>
                          <?php admin() ?>
                          <?php subscriber() ?>
                        </tbody>
                    </table>
                  
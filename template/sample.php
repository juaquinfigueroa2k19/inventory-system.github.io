<div class="row">
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table>
                      <tr>
                        <th>Vegetables</th>
                      </tr>
                    <?php

                    if (mysqli_num_rows($resulta) > 0) {
                      while ($ing = mysqli_fetch_assoc($resulta)) {
                        if ($ing['category'] == 'vegetables') {
                          if ($ing['stocks'] <= $ing['minimum']) {
                            echo "<tr>
                                    <td>".$ing['product_name']."</td>
                                    <td>".$ing['stocks']." /".$ing['measure']."</td>
                                  </tr>";
                          }
                        }
                      }
                    }

                    ?>
                  </table>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table>
                      <tr>
                        <th>Spices and Herbs</th>
                      </tr>
                    <?php

                    if (mysqli_num_rows($resultb) > 0) {
                      while ($ing = mysqli_fetch_assoc($resultb)) {
                        if ($ing['category'] == 'spices') {
                          if ($ing['stocks'] <= $ing['minimum']) {
                            echo "<tr>
                                    <td>".$ing['product_name']."</td>
                                    <td>".$ing['stocks']." /".$ing['measure']."</td>
                                  </tr>";
                          }
                        }
                      }
                    }

                    ?>
                  </table>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table>
                      <tr>
                        <th>Meat</th>
                      </tr>
                    <?php

                    if (mysqli_num_rows($resultc) > 0) {
                      while ($ing = mysqli_fetch_assoc($resultc)) {
                        if ($ing['category'] == 'spices') {
                          if ($ing['stocks'] <= $ing['minimum']) {
                            echo "<tr>
                                    <td>".$ing['product_name']."</td>
                                    <td>".$ing['stocks']." /".$ing['measure']."</td>
                                  </tr>";
                          }
                        }
                      }
                    }

                    ?>
                  </table>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table>
                      <tr>
                        <th>Dairy Product</th>
                      </tr>
                    <?php

                    if (mysqli_num_rows($resultd) > 0) {
                      while ($ing = mysqli_fetch_assoc($resultd)) {
                        if ($ing['category'] == 'Dairy') {
                          if ($ing['stocks'] <= $ing['minimum']) {
                            echo "<tr>
                                    <td>".$ing['product_name']."</td>
                                    <td>".$ing['stocks']." /".$ing['measure']."</td>
                                  </tr>";
                          }
                        }
                      }
                    }

                    ?>
                  </table>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table>
                      <tr>
                        <th>Fruits</th>
                      </tr>
                    <?php

                    if (mysqli_num_rows($resulte) > 0) {
                      while ($ing = mysqli_fetch_assoc($resulte)) {
                        if ($ing['category'] == 'fruits') {
                          if ($ing['stocks'] <= $ing['minimum']) {
                            echo "<tr>
                                    <td>".$ing['product_name']."</td>
                                    <td>".$ing['stocks']." /".$ing['measure']."</td>
                                  </tr>";
                          }
                        }
                      }
                    }

                    ?>
                  </table>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table>
                      <tr>
                        <th>Seafood</th>
                      </tr>
                    <?php

                    if (mysqli_num_rows($resultf) > 0) {
                      while ($ing = mysqli_fetch_assoc($resultf)) {
                        if ($ing['category'] == 'seafood') {
                          if ($ing['stocks'] <= $ing['minimum']) {
                            echo "<tr>
                                    <td>".$ing['product_name']."</td>
                                    <td>".$ing['stocks']." /".$ing['measure']."</td>
                                  </tr>";
                          }
                        }
                      }
                    }

                    ?>
                  </table>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table>
                      <tr>
                        <th>Sugar Products</th>
                      </tr>
                    <?php

                    if (mysqli_num_rows($resultg) > 0) {
                      while ($ing = mysqli_fetch_assoc($resultg)) {
                        if ($ing['category'] == 'sugar') {
                          if ($ing['stocks'] <= $ing['minimum']) {
                            echo "<tr>
                                    <td>".$ing['product_name']."</td>
                                    <td>".$ing['stocks']." /".$ing['measure']."</td>
                                  </tr>";
                          }
                        }
                      }
                    }

                    ?>
                  </table>
                  </div>
                </div>
              </div>


              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table>
                      <tr>
                        <th>Nuts and Oilseeds</th>
                      </tr>
                    <?php

                    if (mysqli_num_rows($resulth) > 0) {
                      while ($ing = mysqli_fetch_assoc($resulth)) {
                        if ($ing['category'] == 'nuts') {
                          if ($ing['stocks'] <= $ing['minimum']) {
                            echo "<tr>
                                    <td>".$ing['product_name']."</td>
                                    <td>".$ing['stocks']." /".$ing['measure']."</td>
                                  </tr>";
                          }
                        }
                      }
                    }

                    ?>
                  </table>
                  </div>
                </div>
              </div>

            </div>

            
      $mob = "added - ($row / unit[$byunit] , [$unitpcs].pcs)";
      // $insert = "INSERT INTO log_stocks (product_name, status, timeT, dateT) VALUES ('$prdname', '$mob', '$timeT24', '$dateT')";
      // echo mysqli_query($conn,$insert);
<link rel="stylesheet" href="Styles.css">
<!-- Script Solicitudes Abiertas-->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card ccard radius-t-0 h-100">
                <div class="position-tl w-102 border-t-3 brc-primary-tp3 ml-n1px mt-n1px"></div>
                <!-- the blue line on top -->
                <div class="card-header pb-3 brc-secondary-l3">
                    <h5 class="card-title mb-2 mb-md-0 text-dark-m3">
                    </h5>
                </div>
                <?php
                $result = mysqli_query($conn, "call Desc_Solicitudes_open()");
                while ($ver = mysqli_fetch_row($result)) {
                    $datos = $ver[0] . "||" .
                        $ver[1] . "||" .
                        $ver[2] . "||" .
                        $ver[3] . "||" .
                        $ver[4] . "||" .
                        $ver[5];
                ?>  <div class="container"> 
                    <div class="card-body pt-2 pb-1 ">
                        <div role="button" class="col   d-flex flex-wrap align-items-center my-2 bgc-secondary-l4 bgc-h-secondary-l3 radius-1 p-25 d-style" onclick="Datos_REC('<?php echo $datos; ?>');">
                            <span class="mr-25 w-4 h-4 overflow-hidden text-center border-1 brc-secondary-m2 radius-round shadow-sm d-zoom-2">
                                <!-- /* Inicio Selector ========================================================================*/ -->
                                <?php
                                $data = $ver[4];
                                if ($data >= 10) {
                                    echo ' <span class="iconify"  style="color:#008000" data-icon="ri:contacts-book-line" data-width="30" data-height="30"></span> ';
                                }
                                if ($data >= 1 and $data  < 10) {
                                    echo ' <span class="iconify"  style="color:#ffc107" data-icon="ri:contacts-book-line" data-width="30" data-height="30"></span> ';
                                }
                                if ($data == 0) {
                                    echo ' <span class="iconify"  style="color:#17a2b8" data-icon="ri:contacts-book-line" data-width="30" data-height="30"></span> ';
                                }
                                if ($data < 0) {
                                    echo ' <span class="iconify"  style="color:#df4759" data-icon="ri:contacts-book-line" data-width="30" data-height="30"></span> ';
                                }
                                ?>
                                <!-- /*Fin Selector ========================================================================*/ -->
                            </span>
                            <span class="text-default-d3 text-90 text-600">
                                Solicitud N° <?php echo $ver[0] ?>
                            </span>
                            <span class="ml-auto text-dark-l2 text-nowrap">
                                <?php echo $ver[1] ?>
                            </span>
                            <!-- /* Selector ========================================================================*/ -->
                            <span class="ml-auto text-dark-l2 text-nowrap">
                                <?php
                                $data = $ver[4];
                                if ($data >= 10) {
                                    echo '<span class="badge badge-success"><span class="iconify" data-icon="ant-design:schedule-outlined"></span> ';
                                }
                                if ($data >= 1 and $data  < 10) {
                                    echo '<span class="badge badge-warning"><span class="iconify" data-icon="ant-design:schedule-outlined"></span> ';
                                }
                                if ($data == 0) {
                                    echo '<span class="badge badge-info"><span class="iconify" data-icon="ant-design:schedule-outlined"></span> ';
                                }
                                if ($data < 0) {
                                    echo '<span class="badge badge-danger"><span   class="iconify" data-icon="ant-design:schedule-outlined"></span> ';
                                }
                                ?>
                            </span>
                            <!-- /* Fin selector ========================================================================*/ -->
                        </div>
                        </div>
                    </div>
                <?php
                }
                mysqli_next_result($conn);
                ?>
            </div>
        </div>
        <style>
            .card {
                box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
            }

            .card {
                position: relative;
                display: flex;
                flex-direction: column;
                min-width: 0;
                word-wrap: break-word;
                background-color: #fff;
                background-clip: border-box;
                border: 0 solid rgba(0, 0, 0, .125);
                border-radius: 1rem;
            }

            .bgc-h-secondary-l3:hover,
            .bgc-secondary-l3 {
                background-color: #ebeff1 !important;
            }

            .h-4 {
                height: 2rem;
            }

            .w-4 {
                width: 2rem;
            }

            .d-zoom-1,
            .d-zoom-2,
            .d-zoom-3,
            .dh-zoom-1,
            .dh-zoom-2,
            .dh-zoom-3 {
                transition: -webkit-transform 180ms;
                transition: transform 180ms;
                transition: transform 180ms, -webkit-transform 180ms;
            }

            .mr-25,
            .mx-25 {
                margin-right: .75rem !important;
            }

            .p-25 {
                padding: .75rem !important;
            }

            .radius-1 {
                border-radius: .25rem !important;
            }

            [class*=bgc-h-] {
                transition: background-color .15s;
            }

            .text-default-d3 {
                color: #416578 !important;
            }

            .font-bolder,
            .text-600 {
                font-weight: 600 !important;
            }

            .text-90 {
                font-size: .9em !important;
            }


            .bgc-h-secondary-l4:hover,
            .bgc-secondary-l4 {
                background-color: #f2f4f6 !important;
            }

            .text-danger-m1 {
                color: #da3636 !important;
            }

            .text-green-m1 {
                color: #2c8d6a !important;
            }

            .text-95 {
                font-size: .95em !important;
            }
        </style>

        <script src="Js/Dashboard/Sol_Open.js"></script>
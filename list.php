<?php
session_start();
require('functions.php');
loggedin_only();
upload();
logout();

// Find all files inside uploads/ directory and list them inside a table row

$files = scandir('uploads/');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .bg-royalblue {
            background-color: royalblue;
        }

        @media screen and (max-width: 768px) {
            .smol-screen-no-show {
                display: none;
            }

            .out-box {
                width: auto !important;
            }

            .smol-screen-outer-box {
                padding: 0 !important;
                margin: 0 !important;
                width: 100% !important;
                padding-top: 2rem !important;
            }

            .limited-text {
                position: relative;
                display: inline-block;
                white-space: nowrap;
                overflow: hidden;
            }

            .limited-text::after {
                content: '';
                position: absolute;
                top: 0;
                right: 0;
                width: 3ch;
                /* Adjust based on the fade effect length */
                height: 100%;
                background: linear-gradient(to left, white, transparent);
                pointer-events: none;
            }

            .limited-text span {
                display: inline-block;
                max-width: 8ch;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            /* Custom styles */
            .round-button {
                display: block !important;
                position: fixed;
                bottom: 20px;
                right: 20px;
                width: 60px;
                height: 60px;
                background-color: #000C66;
                border-radius: 50%;
                border: none;
                color: white;
                font-size: 24px;
                cursor: pointer;
                display: flex;
                justify-content: center;
                align-items: center;
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            }

            /* Style for the plus symbol */
            .smol-screen-button-disappear {
                display: none;
            }
        }

        .plus-symbol {
            position: relative;
            width: 20px;
            height: 2px;
            font-weight: 900;
            background-color: white;
        }

        .plus-symbol::before,
        .plus-symbol::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 20px;
            height: 2px;
            background-color: white;
        }

        .plus-symbol::before {
            transform: translate(-50%, -50%) rotate(90deg);
        }
    </style>
</head>

<body>
    <div class="container out-box">
        
        <nav class="navbar justify-content-between" style="margin-top: 2rem;">
            <a class="navbar-brand" style="color:#000C66; font-weight: 650; font-size: 27;">ManDrive</a>
            <div>
                <form action="#" method="POST">
                    <a href="logout.php"> <button type="submit" name="upload" class="btn smol-screen-button-disappear" style="background-color: #000C66; color: white; border-radius: 10px; margin-bottom: 0; margin-right: 1rem;">Upload</button></a>
                    <a href="logout.php"> <button type="submit" name="logout" class="btn" style="background-color: #000C66; color: white; border-radius: 10px; margin-bottom: 0;">Log
                            Out</button></a>
                </form>
            </div>
        </nav>
        <form action="#" method="POST">
        <button type="submit" name="upload" class="round-button" style="display: none;">
            <span class="plus-symbol"></span>
        </button>
        </form>
        <div class="bg-white text-dark p-4 smol-screen-outer-box">
            <div class=" bg-white rounded-lg shadow-lg overflow-hidden" style="background-color: #000C66;">
                <div class="p-4">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
                        <div>
                            <h1 class="h5 font-weight-bold text-dark">Welcome Back !</h1>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th class="smol-screen-no-show">Uploaded On</th>
                                    <th class="smol-screen-no-show">Size</th>
                                    <th>Preview</th>
                                    <th>Download</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for ($i = 2; $i < count($files); $i++) {
                                    echo "<tr>";
                                    echo "<td class='d-flex align-items-center flex-wrap'><div class='text-dark limited-text'><span>" . $files[$i] . "</span></div></td>";
                                    echo "<td class='smol-screen-no-show'>" . date("M d, Y", filemtime('uploads/' . $files[$i])) . "</td>";
                                    
                                    // Calculate file size in MB
                                    $filesize_mb = filesize('uploads/' . $files[$i]) / (1024 * 1024);
                                    echo "<td class='smol-screen-no-show'>" . round($filesize_mb, 2) . " MB</td>";
                                    
                                    echo "<td><a href='uploads/" . $files[$i] . "' target='_blank' class='btn' style='color: #000C66;'><i class='fa fa-eye' style='font-size:24px;'></i>&nbsp</a>&nbsp&nbsp</td>";
                                    echo "<td>&nbsp&nbsp<a href='uploads/" . $files[$i] . "' download class='btn' style='color: #000C66;'>&nbsp<i class='fa fa-download'></i>&nbsp</a>&nbsp&nbsp</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


<!DOCTYPE html>
<html class="loading">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Card Checker</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        /* Custom styling */
        body {
            background-color: #343a40; /* Dark grey background */
            color: #ffffff; /* Text color */
        }
        /* Card section */
        .card-section {
            margin-top: 20px;
            background-color: #495057; /* Dark grey card background */
            border: 1px solid #343a40; /* Dark grey border */
            border-radius: 10px;
            padding: 20px;
        }
        /* Card header */
        .card-header {
            background-color: #212529; /* Darker grey header background */
            color: #ffffff; /* Header text color */
            border-radius: 5px;
            padding: 10px;
        }
        /* Buttons */
        .btn-small {
            padding: 5px 10px;
            font-size: 12px;
            margin-right: 5px;
        }

        .menu-btn {
            margin-bottom: 10px;
        }

        .menu {
            display: none;
        }

        .btn-start {
            background-color: #28a745; /* Dark green start button */
            border: 1px solid #000000; /* Black border */
            color: #ffffff; /* Text color */
        }

        .btn-stop {
            background-color: #dc3545; /* Dark red stop button */
            border: 1px solid #000000; /* Black border */
            color: #ffffff; /* Text color */
        }
        /* Badges */
        .badge-dark {
            background-color: #343a40;
        }

        .badge-green {
            background-color: #28a745;
        }

        .badge-blue {
            background-color: #007bff;
        }

        .badge-orange {
            background-color: #fd7e14;
        }

        .badge-yellow {
            background-color: #ffc107;
        }

        .badge-text {
            display: block;
            margin-top: 5px;
        }
        
        .show-hide-btn {
    margin-bottom: 10px;
    margin-right: 5px;
}

.menu-btn {
    margin-bottom: 10px;
}

@media (max-width: 768px) {
    .col-md-6 {
        margin-bottom: 10px;
    }
}

        
    </style>
</head>

<body>
  
<!-- Header -->
<div class="card-body">
    <center>
        <h2><i class="fa fa-credit-card"></i> Credit Card Checker <i class="fa fa-check-circle"></i></h2>
        <p>Verify Your Credit Cards With Ease Using Different Payment Gateways! <i class="fa fa-globe"></i></p>
        <p>Choose Your Gateway and Start Checking Below <i class="fa fa-arrow-down"></i></p>
    </center>
</div>


 
    
    <br>
    
    <!-- Main content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
         <!-- Textarea for input -->
                <textarea class="form-checker form-control" rows="5" id="ccInput" placeholder="Enter CCs" style="background-color: #495057; color: #ffffff;"></textarea>
  
                <br>
 
 <!-- Select menu for gate options -->
                <div class="col-md-12">
    <select class="form-control" id="gateSelect">
      <option >--Select Atleast One Gate--</option>
<option value="cpanel.php">Stripe Charge $1.00 [✅ON]</option>
 <!-- Add more options for other gates as needed -->
    </select>
</div>

                <br>
   
   <!-- Start and stop buttons -->
   
                <div class="text-center">
                    <button class="btn btn-primary btn-start"><i class="fa fa-play"></i> Start Checking</button>
                    <button class="btn btn-danger btn-stop"><i class="fa fa-stop"></i> Stop Checking</button>
                </div>
            </div>
            
            
      <!-- Badges for card counts -->           
            
            <div class="col-md-12 mt-3">
                <div class="row justify-content-center">
                    <div class="col-4 col-md-2 text-center">
                        <span class="badge badge-success"><i class="fa fa-money"></i></span><br>
                        <span class="badge-text">Charged</span>
                        <span id="chargedCountBadge">0</span>
                    </div>
                    <div class="col-4 col-md-2 text-center">
                        <span class="badge badge-blue"><i class="fa fa-bank"></i></span><br>
                        <span class="badge-text">Live</span>
                        <span id="liveCountBadge">0</span>
                    </div>
                    <div class="col-4 col-md-2 text-center">
                        <span class="badge badge-orange"><i class="fa fa-credit-card"></i></span><br>
                        <span class="badge-text">CCN</span>
                        <span id="ccnCountBadge">0</span>
                    </div>
                    <div class="col-4 col-md-2 text-center">
                        <span class="badge badge-danger"><i class="fa fa-times-circle"></i></span><br>
                        <span class="badge-text">Dead</span>
                        <span id="deadCountBadge">0</span>
                    </div>
                    <div class="col-4 col-md-2 text-center">
                        <span class="badge badge-warning"><i class="fa fa-check-circle"></i></span><br>
                        <span class="badge-text">Checked</span>
                        <span id="checkedCountBadge">0</span>
                    </div>
                    <div class="col-4 col-md-2 text-center">
                        <span class="badge badge-secondary"><i class="fa fa-download"></i></span><br>
                        <span class="badge-text">Loaded</span>
                        <span id="totalCountBadge">0</span>
                    </div>
                </div>
            </div>

            <br>
            <br>
            <br>

<!-- Show/hide buttons for menu sections -->

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="text-center">
                <button class="btn btn-secondary show-hide-btn menu-btn" id="chargedShowHideBtn"><i class="fa fa-eye"></i> Toggle Charged</button>
                <button class="btn btn-secondary show-hide-btn menu-btn" id="liveShowHideBtn"><i class="fa fa-eye"></i> Toggle Live</button>
            </div>
        </div>
        <div class="col-md-6">
            <div class="text-center">
                <button class="btn btn-secondary show-hide-btn menu-btn" id="ccnShowHideBtn"><i class="fa fa-eye"></i> Toggle CCN</button>
                <button class="btn btn-secondary show-hide-btn menu-btn" id="deadShowHideBtn"><i class="fa fa-eye"></i> Toggle Dead</button>
            </div>
        </div>
    </div>
</div>

<!-- Card sections for different card statuses -->

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <div class="card card-section menu" id="chargedMenu">
                            <div class="card-header badge badge-green">
                                <i class="fa fa-money"></i> CHARGED CARDS
                            </div>
                            <div class="card-body" id="chargedList"></div>
                            <button class="btn btn-sm btn-primary btn-copy"><i class="fa fa-copy"></i> Copy</button>
                            <button class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash"></i> Delete</button>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <div class="card card-section menu" id="liveMenu">
                            <div class="card-header badge badge-blue">
                                <i class="fa fa-bank"></i> LIVE CARDS
                            </div>
                            <div class="card-body" id="liveList"></div>
                            <button class="btn btn-sm btn-primary btn-copy"><i class="fa fa-copy"></i> Copy</button>
                            <button class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash"></i> Delete</button>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <div class="card card-section menu" id="ccnMenu">
                            <div class="card-header badge badge-orange">
                                <i class="fa fa-credit-card"></i> CCN CARDS
                            </div>
                            <div class="card-body" id="ccnList"></div>
                            <button class="btn btn-sm btn-primary btn-copy"><i class="fa fa-copy"></i> Copy</button>
                            <button class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash"></i> Delete</button>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <div class="card card-section menu" id="deadMenu">
                            <div class="card-header badge badge-danger">
                                <i class="fa fa-times-circle"></i> DEAD CARDS
                            </div>
                            <div class="card-body" id="deadList"></div>
                            <button class="btn btn-sm btn-primary btn-copy"><i class="fa fa-copy"></i> Copy</button>
                            <button class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash"></i> Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery library -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
    <!-- Script for functionality -->

    <script>
        $(document).ready(function () {
            var maxCards = 1000;
            var currentCards = 0;
            var checkingStatus = false;
            var checkingInProgress = false;

            $('.menu-btn').click(function () {
        var menuId = $(this).attr('id').replace('ShowHideBtn', 'Menu');
        // Close all other menus
        $('.menu').not('#' + menuId).hide();
        // Toggle the clicked menu
        $('#' + menuId).toggle();
    });

            $('.btn-copy').click(function () {
                var text = $(this).prev('.card-body').text().trim();
                copyToClipboard(text);
            });

            $('.btn-delete').click(function () {
                $(this).siblings('.card-body').html('');
            });

            var ajaxRequests = []; // Array to store ongoing AJAX requests

          $('.btn-start').click(function () {
    var lista = $('#ccInput').val().trim();
    var array = lista.split('\n');
    var totalCount = array.length;

    if (checkingInProgress) {
        alert("🚨 Checking Is Already In Progress. ⚠️ \nPlease Wait For The Current Process To Finish. ✅");
        return;
    }

    if (totalCount === 0 || (totalCount === 1 && array[0].trim() === "")) {
        alert("[ERROR] | Please Provide Atleast One Credit Card To Check. ❌");
        return;
    }

    if (totalCount > maxCards) {
        alert("[Limit] | Maximum 1000 Cards Are Allowed. Please Reduce The Number Of Cards. ⚠️");
        return;
    }

    var selectedGate = $('#gateSelect').val(); // Get the selected gate

    if (!selectedGate || selectedGate === "--Select Atleast One Gate--") {
        alert("⚠️ Please Select A Gate Before Starting The Checking Process. ⚠️");
        return;
    }

    checkingStatus = true;
    checkingInProgress = true; // Update checkingInProgress
    $('#ccInput').attr('disabled', true);
    $('#totalCountBadge').text(totalCount);
    alert("[Started] | Checking Has Been Started ✅ | Please Be Patient For Responses.👍");
    // Clear any existing AJAX requests
    ajaxRequests.forEach(function (request) {
        request.abort();
    });

    // Clear the array of AJAX requests
    ajaxRequests = [];

    // Begin checking CCs using the selected gate
    checkCCs(array, selectedGate);
});

            $('.btn-stop').click(function () {
                if (checkingInProgress) {
                    // Set checkingStatus to false to stop further checking
                    checkingStatus = false;
                    // Reset checkingInProgress to indicate checking has stopped
                    checkingInProgress = false;
                    // Abort ongoing AJAX requests
                    ajaxRequests.forEach(function (request) {
                        request.abort();
                    });
                    // Clear the array of AJAX requests
                    ajaxRequests = [];
                    // Alert that checking has been stopped
                    alert("[Stopped] | Checking Has Been Stopped. 🚫");
                } else {
                    // If no checking is in progress, alert accordingly
                    alert("🚨 No Checking In Process 🛑");
                }
            });

         function checkCCs(array, selectedGate) {
    var index = 0; // Initialize index to iterate through the array
    var interval = setInterval(function () {
        if (!checkingStatus || index >= array.length) {
            clearInterval(interval); // Stop the interval if checking is stopped or all cards are checked
            return;
        }
        var data = array[index]; // Get the current card data
        var request = $.ajax({
            url: selectedGate, // Use the selected gate
            type: 'GET',
            data: {
                lista: data
            },
            success: function (response) {
                currentCards++;
                // Update badge counts based on response
                updateBadgeCounts(response);
                // Append the response below the corresponding card body
                var cardBody = determineCardBody(response);
                cardBody.append('<div>' + response + '</div>');
                // Update checked CCs count badge
                $('#checkedCountBadge').text(parseInt($('#checkedCountBadge').text()) + 1);
                // Remove the processed card from the textarea placeholder
                $('#ccInput').val(function (_, val) {
                    return val.replace(data + '\n', '');
                });
                // Check if all cards have been checked
                if (currentCards === array.length) {
                    // Display notification that checking is completed
                    alert("[Finished] | All Credit Card Checked Has Been Completed Successfully. ✅");
                }
            }
        });
        // Store the AJAX request in the array
        ajaxRequests.push(request);
        index++; // Move to the next card in the array
        if (index >= array.length) {
            clearInterval(interval); // Stop the interval if all cards are checked
        }
    }, 1000); // 3-second interval between each check
}

            function updateBadgeCounts(response) {
                if (response.includes('#Charged') || response.includes('#Hits')) {
                    $('#chargedCountBadge').text(parseInt($('#chargedCountBadge').text()) + 1);
                } else if (response.includes('#Live') || response.includes('#Approved')) {
                    $('#liveCountBadge').text(parseInt($('#liveCountBadge').text()) + 1);
                } else if (response.includes('#Ccn')) {
                    $('#ccnCountBadge').text(parseInt($('#ccnCountBadge').text()) + 1);
                } else {
                    $('#deadCountBadge').text(parseInt($('#deadCountBadge').text()) + 1);
                }
            }

            function determineCardBody(response) {
                if (response.includes('#Charged') || response.includes('#Hits')) {
                    return $('#chargedList');
                } else if (response.includes('#Live') || response.includes('#Approved')) {
                    return $('#liveList');
                } else if (response.includes('#Ccn')) {
                    return $('#ccnList');
                } else {
                    return $('#deadList');
                }
            }

            function copyToClipboard(text) {
                var $temp = $("<textarea>");
                $("body").append($temp);
                $temp.val(text).select();
                document.execCommand("copy");
                $temp.remove();
                alert("✅ Copied To Clipboard: " + text);
            }
        });
    </script>

    <!-- Footer -->
 
<footer>
    <center>
        <div class="footer-copyright text-center py-3">
            🛡️ Secure Payment Checkpoint 🛡️<br>
            Developed With ❤️ By 🏴‍☠️ Ashish 🏴‍☠️: <a href="https://t.me/Ashish_xD"> @Ashish_xD</a> <i class="fa fa-telegram"></i>
        </div>
    </center>
</footer>




</body>

</html>

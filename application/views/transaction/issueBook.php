<?php
/**
 * Created by PhpStorm.
 * User: Nilesh Thadani
 * Date: 02-07-2016
 * Time: 17:43
 */
?>
<script type="text/javascript">
    function loadTransactionDetails() {
        var memberid = document.getElementById('memberId').value;
        if(memberid.trim()==""){
            alert("Member Id field is empty!");
        }
        else{
            jQuery("#edu-book-id").html('No Information available');
            jQuery("#edu-issue-date").html('');
            jQuery("#edu-return-date").html('');
            jQuery("#edu-fine").html('');
            jQuery("#other-book-id").html('No Information available');
            jQuery("#other-issue-date").html('');
            jQuery("#other-return-date").html('');
            jQuery("#other-fine").html('');
            getDetails(memberid.trim());
        }
    }
    
    function getDetails(memberid) {
        jQuery.ajax({
            type:"POST",
            url: "<?php echo URL;?>index.php/transaction/getDetails/",
            dataType:'json',
            data: {member_id : memberid},
            error: function(result){
                $('#edu-book-id').html('Error occured while loading data!'+result);
                console.log(result);
            },
            success: function(result){
                console.log(result);
                var l = result.length;
                for(var i=0;i<l;i++){
                    if(result[i]['book_id'].length==10){
                        jQuery("#edu-tran-id").html('<strong>Transaction ID: </strong>'+result[i]['t_id']);
                        jQuery("#edu-book-id").html('<strong>Book ID: </strong>'+result[i]['book_id']);
                        jQuery("#edu-issue-date").html('<strong>Issue Date: </strong>'+result[i]['issue_date']);
                        jQuery("#edu-return-date").html('<strong>Return Date: </strong>'+result[i]['return_date']);
                        var current_date = getCurrentDate();
                        if(current_date > result[i]['return_date']){
                            $('#edu-fine').css('color', '#ff0000');
                            var fine = calculateFine(result[i]['return_date'],current_date,'edu-fine-amt',memberid);
                            jQuery("#edu-fine").html('<strong>Return this book at the earliest</strong>');
                        }
                        else{
                            $('#edu-fine').css('color', '#399100');
                            jQuery("#edu-fine").html('<strong>Member has time to return this book</strong>');
                        }
                    }
                    else{
                        jQuery("#other-tran-id").html('<strong>Transaction ID: </strong>'+result[i]['t_id']);
                        jQuery("#other-book-id").html('<strong>Book ID: </strong>'+result[i]['book_id']);
                        jQuery("#other-issue-date").html('<strong>Issue Date: </strong>'+result[i]['issue_date']);
                        jQuery("#other-return-date").html('<strong>Return Date: </strong>'+result[i]['return_date']);
                        var current_date = getCurrentDate();
                        if(current_date > result[i]['return_date']){
                            $('#other-fine').css('color', '#ff0000');
                            var fine = calculateFine(result[i]['return_date'],current_date,'other-fine-amt', memberid);
                            jQuery("#other-fine").html('<strong>Return this book at the earliest</strong>');
                        }
                        else{
                            $('#other-fine').css('color', '#399100');
                            jQuery("#other-fine").html('<strong>Member has time to return this book</strong>');
                        }
                    }

                }
            }
        });
    }
    function getCurrentDate(){
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();
        if(dd<10) {
            dd='0'+dd
        }
        if(mm<10) {
            mm='0'+mm
        }
        today = dd+'-'+mm+'-'+yyyy;
        return today;
    }
    function calculateFine(return_date, current_date, id, memberid){
        jQuery.ajax({
            type: "POST",
            url: "<?php echo URL;?>index.php/transaction/calculateFine/",
            dataType: 'json',
            data: {return: return_date,current: current_date,member_id: memberid},
            error: function (result) {
                console.log(result['difference']);
            },
            success: function (result) {
                $('#'+id).css('color', '#ff0000');
                $('#'+id).html("<strong>Fine: ₹. "+result['difference']+"</strong>");
            }
        });

    }
</script>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="page-header heading">
                <h3>Issue Book</h3><p class="help-block">(Add Details to issue Book)</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo URL.'index.php/transaction/issueBook'; ?>" method="POST" role="form">
                    <div class="row">
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <!--<br>
                                <label for="bookType">
                                    <input type="radio" name="bookType" id="bookType" value="0" checked>
                                    Educational
                                </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <label for="bookType">
                                    <input type="radio" name="bookType" id="bookType" value="1">
                                    Magazine
                                </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <label for="bookType">
                                    <input type="radio" name="bookType" id="bookType" value="2">
                                    Novel
                                </label>-->
                                <label for="bookType"><h5>Select Book Type *</h5></label>
                                <select name="bookType" id="bookType" class="form-control select-plugin" required>
                                    <option disabled>Please select an option from here!</option>
                                    <option value="0">Educational</option>
                                    <option value="1">Magazine</option>
                                    <option value="2">Novel</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label for="memberId"><h5>Member ID *</h5></label>

                                <div class="input-group">
                                    <input type="number" class="form-control" id="memberId" name="memberId" placeholder="Enter Member ID" min="1">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-success btn-outline" data-toggle="dropdown" onclick="loadTransactionDetails()">
                                            <!--<span class="glyphicon glyphicon-ok-sign"></span>--><i class="fa fa-check-square" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <label for="bookId"><h5>Book ID *</h5></label>
                            <input type="number" class="form-control" name="bookId" id="bookId" placeholder="Enter numeric Book ID" required="true" min="10001">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-offset-2">
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <button type="submit" class="btn btn-success btn-block" name="issueBook" id="issueBook">Add Entry</button>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <button class="btn btn-default btn-outline btn-block" name="resetDetails" type="reset">Reset form</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <h4 class="page-header">Issued Book Details</h4>
            <div class="col-md-12">
                <div class="col-md-6 col-sm-6 col-xs-12" style="border: 1px solid #ddd">
                    <h5 class="page-header">
                        Educational Book:-
                    </h5>
                    <h5><p id="edu-tran-id"></p></h5>
                    <h5><p id="edu-book-id">No Information available</p></h5>
                    <h5><p id="edu-issue-date"></p></h5>
                    <h5><p id="edu-return-date"></p></h5>
                    <h5><p id="edu-fine"></p></h5>
                    <h5><p id="edu-fine-amt"></p></h5>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12" style="border: 1px solid #ddd">
                    <h5 class="page-header">
                        Novel/Magazine:-
                    </h5>
                    <h5><p id="other-tran-id"></p></h5>
                    <h5><p id="other-book-id">No Information available</p></h5>
                    <h5><p id="other-issue-date"></p></h5>
                    <h5><p id="other-return-date"></p></h5>
                    <h5><p id="other-fine"></p></h5>
                    <h5><p id="other-fine-amt"></p></h5>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
/**
 * Created by PhpStorm.
 * User: Nilesh Thadani
 * Date: 04-07-2016
 * Time: 16:56
 */
?>
<script type="text/javascript">
    var mem_id="", edu_bookid="", other_bookid="", edu_tran_id="",other_tran_id="";
    function getDetails() {
        var memberid = document.getElementById('memberId').value;
        if(memberid.trim()==""){
            alert("Member Id field is empty!");
        }
        else{
            mem_id = memberid;
            var edu_div = document.getElementById('edu-div');
            var other_div = document.getElementById('other-div');

            jQuery("#mem_id").html('');
            jQuery("#edu_tran_id").html('');
            jQuery("#edu-book-id").html('No Information available');
            jQuery("#edu-issue-date").html('');
            jQuery("#edu-return-date").html('');
            jQuery("#edu-fine").html('');
            $('#edu_return').css('display', 'none');
            $('#edu-div').css('display', 'none');
            jQuery("#edu-tran-id").html('');
            jQuery("#other-book-id").html('No Information available');
            jQuery("#other-issue-date").html('');
            jQuery("#other-return-date").html('');
            jQuery("#other-fine").html('');
            jQuery("#other-tran-id").html('');
            $('#other_return').css('display', 'none');
            $('#other-div').css('display', 'none');
            getIssuedBookDetails(memberid.trim());
        }
    }

    function getIssuedBookDetails(memberid){
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
                jQuery("#mem_id").html(memberid);
                //jQuery("#other-fine").html("<strong>"+memberid+"</strong>");
                for(var i=0;i<l;i++){
                    var edu_div = document.getElementById('edu-div');
                    var other_div = document.getElementById('other-div');
                    if(result[i]['book_id'].length==10){
                        edu_bookid = result[i]['book_id'];
                        edu_tran_id = result[i]['t_id'];
                        jQuery("#edu-tran-id").html('<strong>Transaction ID: </strong>'+result[i]['t_id']);
                        jQuery("#edu-book-id").html('<strong>Book ID: </strong>'+result[i]['book_id']);
                        jQuery("#edu-issue-date").html('<strong>Issue Date: </strong>'+result[i]['issue_date']);
                        jQuery("#edu-return-date").html('<strong>Return Date: </strong>'+result[i]['return_date']);
                        var current_date = getCurrentDate();
                        if(current_date > result[i]['return_date']){
                            $('#edu-div').css('display', '');
                            $('#edu-fine').css('color', '#ff0000');
                            var fine = calculateFine(result[i]['return_date'],current_date,'edu-fine-amt',memberid);
                            jQuery("#edu-fine").html('<strong>Return this book at the earliest</strong>');
                        }
                        else{
                            $('#edu-fine').css('color', '#399100');
                            $('#edu_return').css('display', 'block');
                            jQuery("#edu-fine").html('<strong>Member has time to return this book</strong>');
                        }
                    }
                    else{
                        other_bookid = result[i]['book_id'];
                        other_tran_id = result[i]['t_id'];
                        jQuery("#other-tran-id").html('<strong>Transaction ID: </strong>'+result[i]['t_id']);
                        jQuery("#other-book-id").html('<strong>Book ID: </strong>'+result[i]['book_id']);
                        jQuery("#other-issue-date").html('<strong>Issue Date: </strong>'+result[i]['issue_date']);
                        jQuery("#other-return-date").html('<strong>Return Date: </strong>'+result[i]['return_date']);
                        var current_date = getCurrentDate();
                        if(current_date > result[i]['return_date']){
                            $('#other-fine').css('color', '#ff0000');
                            var fine = calculateFine(result[i]['return_date'],current_date,'other-fine-amt', memberid);
                            jQuery("#other-fine").html('<strong>Return this book at the earliest</strong>');
                            $('#other-div').css('display', '');
                        }
                        else{
                            $('#other-fine').css('color', '#399100');
                            $('#other_return').css('display', 'block');
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
                $('#'+id).html("<strong>"+result['difference']+"</strong>");
            }
        });
    }

    function eduPay() {
        var fine_amt = document.getElementById('edu-fine-amt').innerText;
        var fine_pay = document.getElementById('edu-fine-paid').value;
        fine_pay = fine_pay.trim();
        if(fine_pay!="" && fine_pay>0 && (fine_amt-fine_pay)>=0){
            jQuery.ajax({
                type: "GET",
                url: "<?php echo URL;?>index.php/transaction/payFine/",
                dataType: 'json',
                data: {member_id: mem_id,amt: fine_amt, pay: fine_pay, book_id: edu_bookid, book_type: "edu", tran_id: edu_tran_id},
                error: function (result) {
                    $('#edu-book-id').html('Error occured while loading data!');
                    console.log(result);
                },
                success: function (result) {
                    $('#edu-book-id').html(result['msg']);
                    jQuery("#edu-issue-date").html('');
                    jQuery("#edu-return-date").html('');
                    $('#edu_return').css('display', 'none');
                    $('#edu-div').css('display', 'none');
                    $('#edu_return').html('Return this book');
                    getIssuedBookDetails(mem_id.trim());
                    jQuery("#edu-fine").html('');
                }
            });
        }
        else{
            alert("Fine amount entered is should be more than ₹.1 and less than or equal to the total fine due on this book.");
        }
    }
    function otherPay() {
        var fine_amt = document.getElementById('other-fine-amt').innerText;
        var fine_pay = document.getElementById('other-fine-paid').value;
        fine_pay = fine_pay.trim();
        if(fine_pay!="" && fine_pay>0 && (fine_amt-fine_pay)>=0){
            jQuery.ajax({
                type: "GET",
                url: "<?php echo URL;?>index.php/transaction/payFine/",
                dataType: 'json',
                data: {member_id: mem_id,amt: fine_amt, pay: fine_pay, book_id: other_bookid, book_type: "other", tran_id: other_tran_id},
                error: function (result) {
                    $('#other-book-id').html('Error occured while loading data!');
                    console.log(result);
                },
                success: function (result) {
                    $('#other-book-id').html(result['msg']);
                    jQuery("#other-issue-date").html('');
                    jQuery("#other-return-date").html('');
                    $('#other_return').css('display', 'none');
                    $('#other-div').css('display', 'none');
                    $('#other_return').html('Return this book');
                    getIssuedBookDetails(mem_id.trim());
                    jQuery("#other-fine").html('');
                }
            });
        }
        else{
            alert("Fine amount entered is should be more than ₹.1 and less than or equal to the total fine due on this book.");
        }
    }

    function eduReturn() {
        $('#edu_return').html('Please Wait...');
        jQuery.ajax({
            type: "GET",
            url: "<?php echo URL;?>index.php/transaction/justReturnBook/",
            dataType: 'json',
            data: {member_id: mem_id, book_id: edu_bookid, book_type: "other", tran_id: edu_tran_id},
            error: function (result) {
                //show error
                $('#edu-book-id').html('Error occured while loading data!');
                console.log(result);
            },
            success: function (result) {
                //refresh page and show success message
                var edu_div = document.getElementById('edu-div');
                jQuery("#edu-book-id").html('Book returned successfully');
                jQuery("#edu-issue-date").html('');
                jQuery("#edu-return-date").html('');
                $('#edu_return').css('display', 'none');
                $('#edu-div').css('display', 'none');
                $('#edu_return').html('Return this book');
                getIssuedBookDetails(mem_id.trim());
                jQuery("#edu-fine").html('');
            }
        });
    }

    function otherReturn() {
        $('#other_return').html('Please Wait...');
        jQuery.ajax({
            type: "GET",
            url: "<?php echo URL;?>index.php/transaction/justReturnBook/",
            dataType: 'json',
            data: {member_id: mem_id, book_id: other_bookid, book_type: "other", tran_id: other_tran_id},
            error: function (result) {
                //show error
                $('#other-book-id').html('Error occured while loading data!');
                console.log(result);
            },
            success: function (result) {
                var other_div = document.getElementById('other-div');
                jQuery("#other-book-id").html('Book returned successfully');
                jQuery("#other-issue-date").html('');
                jQuery("#other-return-date").html('');
                $('#other_return').css('display', 'none');
                $('#other-div').css('display', 'none');
                $('#other_return').html('Return this book');
                getIssuedBookDetails(mem_id.trim());
                jQuery("#other-fine").html('');
            }
        });
    }
</script>

<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h3>Return Book</h3><p class="help-block">Add Member Details to confirm book return</p>
            </div>
        </div>
    </div>  `
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-offset-3 col-md-6">
                    <form action="" method="POST" role="form">
                        <label for="memberid"><h5>Member ID *</h5></label>
                        <div class="input-group">
                            <input type="number" min="1" class="form-control" placeholder="Enter member ID" name="memberId" id="memberId">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-outline" type="button" onclick="getDetails()">Go!</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Already issued book details are displayed with this code-->
        <div class="row">
            <h4 class="page-header">Issued Book Details</h4>
            <h5><strong>Member ID:&nbsp;&nbsp;<button id="mem_id" class="btn btn-primary badge" disabled>Not specified</button></strong></h5>
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
                    <div style="margin-bottom: 5px">
                        <button class="btn btn-success btn-outline btn-block" onclick="eduReturn()" id="edu_return" type="button" style="display: none">Return this book</button>
                        <div class="input-group" style="display: none" id="edu-div">
                            <span class="input-group-addon" style="color: #ff0000; border-right: 0px; padding-right: 0px"><strong>Fine - ₹.</strong>&nbsp;</span>
                            <span class="input-group-addon" id="edu-fine-amt" style="border-left: 0px; padding-left: 0px"></span>
                            <input type="number" class="form-control" id="edu-fine-paid" placeholder="Enter penalty being paid" min="0" required>
                            <div class="input-group-btn">
                                <button class="btn btn-success btn-outline" type="button" id="edu-fine-paid-btn" onclick="eduPay()">Pay and Return</button>
                            </div>
                        </div>
                    </div>


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
                    <div style="margin-bottom: 5px">
                        <button class="btn btn-success btn-outline btn-block" onclick="otherReturn()" id="other_return" type="button" style="display: none">Return this book</button>
                        <div class="input-group" style="display: none" id="other-div">
                            <span class="input-group-addon" style="color: #ff0000; border-right: 0px; padding-right: 0px"><strong>Fine - ₹.</strong>&nbsp;</span>
                            <span class="input-group-addon" id="other-fine-amt" style="border-left: 0px; padding-left: 0px"></span>
                            <input type="number" class="form-control" id="other-fine-paid" placeholder="Enter penalty being paid" min="0" required>
                            <div class="input-group-btn">
                                <button class="btn btn-success btn-outline" type="button" id="other-fine-paid-btn" onclick="otherPay()">Pay and Return</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

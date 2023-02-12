<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('assets/blur_dashboard/css/LoginProfile.css')}}" />
    <title>Talk To Toppers</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css"
        integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"
        integrity="sha512-sH8JPhKJUeA9PWk3eOcOl8U+lfZTgtBXD41q6cO/slwxGHCxKcW45K4oPCUhHG7NMB4mbKEddVmPuTXtpbCbFA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    ></script>
</head>
<body>
<section>
    <div class="profile">
        <div class="background">
            <form method="POST" action="{{ route('profile.update') }}" id="crete_account_form" enctype="multipart/form-data">
                @csrf
                <!-- <div class="profileAvtar">
                  <input type="file" >

                </div> -->
                <div class="fileupload1">
                    <input type="file" name="avatar" />
                    <img
                        class="photo"
                        src="{{$user->avatar == null ? asset('assets/blur_dashboard/img/photo-camera-interface-symbol-for-button 1.svg') : asset(Storage::url($user->avatar))}}"
                        alt=""
                    />
                </div>
        </div>
        <div class="picture">
            <h3>Upload your picture</h3>

            <div class="feild">
                <label>Name</label><br />
                <input type="text" name="name" value="{{ old('name') ? old('name') : $user->name}}" />
{{--                    @error('name')--}}
                        <span class="errorColor text-danger name text-center"></span>
{{--                    @enderror--}}
                <br /><br />
                <label>Email ID</label><br />
                <input type="email" name="email" value="{{$user->email}}" disabled/><br /><br />

                <label>Phone Number</label><br />

                <input type="tel" name="phonenumber" value="{{$user->phonenumber}}" disabled/><br /><br />
                <label>PAN Card Number</label><br />
                <input type="text" name="pan" value="{{$user->pan_card}}" />
{{--                @error('pan')--}}
                <span class="errorColor text-danger pan text-center"></span>
{{--                @enderror--}}
                <br /><br />
                <label>Aadhar Card Number</label><br />
                <input type="text" value="{{$user->aadhar}}"  class="aadhar_val" name="aadhar" />
{{--                    @error('aadhar')--}}
                    <span class="errorColor aadhar text-danger text-center"></span>
{{--                    @enderror--}}
                <br /><br />
            </div>
            <div class="Category">
                <p>Category</p>
                <div class="radio">
                    <div>
                        <input
                            type="radio"
                            id="html"
                            name="category"
                            value="Gen"
                        {{$user->category == 'Gen' ? 'checked' : ''}} />
                        <label for="html">Gen</label>
                    </div>
                    <div>
                        <input
                            type="radio"
                            id="css"
                            name="category"
                            value="OBC"
                            {{$user->category == 'OBC' ? 'checked' : ''}}
                        />
                        <label for="css">OBC</label>
                    </div>
                    <div>
                        <input
                            type="radio"
                            id="javascript"
                            name="category"
                            value="ST/SC"
                            {{$user->category == 'ST/SC' ? 'checked' : ''}}
                        />
                        <label for="javascript">ST/SC</label>
                    </div>

                </div>
{{--                @error('category')--}}
                <span class="errorColor category text-danger text-center"></span>
{{--                @enderror--}}
            </div>
            @php
                $exam_ebility = [];
                if($user->exam_ebility!=null){
                    $exam_ebility = explode(',',$user->exam_ebility);
                }
            @endphp
            <div class="Exam">
                <p>Exam Eligibility</p>
                <input
                    type="checkbox"
                    id="html"
                    name="exam_ebility[]"
                    value="IIT - JEE" {{in_array('IIT - JEE',$exam_ebility) ? 'checked':''}}
                />
                <label for="html">IIT - JEE</label><br /><br />
                <input type="checkbox" id="css" name="exam_ebility[]" value="CAT" {{in_array('CAT',$exam_ebility) ? 'checked':''}} />
                <label for="css">CAT</label><br /><br />
                <input
                    type="checkbox"
                    id="javascript"
                    name="exam_ebility[]"
                    value="NEET" {{in_array('NEET',$exam_ebility) ? 'checked':''}}
                />
                <label for="javascript">NEET</label><br /><br />
                <input
                    type="checkbox"
                    id="html"
                    name="exam_ebility[]"
                    value="CUET" {{in_array('CUET',$exam_ebility) ? 'checked':''}}
                />
                <label for="html">CUET</label><br /><br />
                <input type="checkbox" id="css" name="exam_ebility[]" {{in_array('OTHERS',$exam_ebility) ? 'checked':''}} value="OTHERS" />
                <label for="css">OTHERS</label>
            </div>
{{--            @error('exam_ebility')--}}
            <span class="errorColor exam_ebility text-danger text-center"></span>
{{--            @enderror--}}
            <div class="upload">
                <div class="fileupload">
                    <img src="{{asset('assets/blur_dashboard/img/file.svg')}}" alt="file" />
                    <p>Aadhar Card</p>
                </div>
                <div class="fileupload">
                    <!-- <img src="img/Vector (1).svg" alt="file" /> -->
                    <input type="file" name="adhar_file" placeholder="Aadhar Card">
                </div>

            </div>
{{--            @error('adhar_file')--}}
            <span class="errorColor adhar_file text-danger text-center"></span>
{{--            @enderror--}}
            <div class="upload">
                <div class="fileupload">
                    <img src="{{asset('assets/blur_dashboard/img/file.svg')}}" alt="file" />
                    <p>PAN Card</p>
                </div>
                <div class="fileupload">
                    <!-- <img src="img/Vector (1).svg" alt="file" /> -->
                    <input type="file" name="pan_card_file" placeholder="Pan Card">
                </div>

            </div>
{{--            @error('pan_card_file')--}}
            <span class="errorColor pan_card_file text-danger text-center"></span>
{{--            @enderror--}}
            <div class="upload">
                <div class="fileupload">
                    <img src="{{asset('assets/blur_dashboard/img/file.svg')}}" alt="file" />
                    <p>Rank (Original Marksheet)</p>
                </div>
                <div class="fileupload">
                    <!-- <img src="img/Vector (1).svg" alt="file" /> -->
                    <input type="file" name="rank_file" placeholder="Marksheet">
                </div>

            </div>
{{--            @error('rank_file')--}}
            <span class="errorColor rank_file text-danger text-center"></span>
{{--            @enderror--}}
            <div class="upload">
                <div class="fileupload">
                    <img src="{{asset('assets/blur_dashboard/img/file.svg')}}" alt="file" />
                    <p>College Name (with proof)</p>
                </div>
                <div class="fileupload">
                    <!-- <img src="img/Vector (1).svg" alt="file" /> -->
                    <input type="file" name="college_name_file" placeholder="College proof">
                </div>

            </div>
{{--            @error('college_name_file')--}}
            <span class="errorColor college_name_file text-danger text-center"></span>
{{--            @enderror--}}
            <button type="submit" class="submitbtn" id="crete_account">Submit</button>
            </form>
        </div>
    </div>
</section>

<script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
></script>
<script type="text/javascript">
    var input = document.getElementsByClassName("aadhar_val");

    input.onkeyup= function () {

        if (input.value.length > 0) {

            if (input.value.length % 4 == 0) {

                input.value += "    ";
            }
        }
    }
    $(".aadhar_val").keypress(function(){
        const sds = $(this).val().split(" ").join("");
        // console.log(sds.split(" ").join(""));
        if (sds.length > 0) {

            if (sds.length % 4 == 0) {
                var valyedrs = $(this).val();
                $(this).val(valyedrs + ' ');
            }
        }
    });


    function postAjax(url, data, is_formData, cb) {
        var token = $('meta[name="csrf-token"]').attr('content');
        if(is_formData){
            var jdata = data;
            $.ajax({
                type: 'POST',
                url: url,
                data: jdata,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    if (typeof (data) === 'object') {
                        cb(data);
                    } else {
                        cb(data);
                    }
                },
            });
        }else{
            var jdata = {_token: token};
            for (var k in data) {
                jdata[k] = data[k];
            }
            $.ajax({
                type: 'POST',
                url: url,
                data: jdata,
                success: function (data) {
                    if (typeof (data) === 'object') {
                        cb(data);
                    } else {
                        cb(data);
                    }
                },
            });
        }
    }

    $("#crete_account").click(function(e) {
        e.preventDefault();
        let myForm = document.getElementById('crete_account_form');
        let data = new FormData(myForm);
        var url = "{{ route('profile.update') }}";
        var is_formData = true;
        data.append('_token','{{ csrf_token() }}');
        postAjax(url, data, is_formData, function(response){
            $('.name').html('');
            $('.pan').html('');
            $('.aadhar').html('');
            $('.category').html('');
            $('.exam_ebility').html('');
            $('.adhar_file').html('');
            $('.pan_card_file').html('');
            $('.rank_file').html('');
            $('.college_name_file').html('');
            if(response.is_success){
                // toastrs('Success', response.res_message, 'success');
                window.location.href = response.url;
                //location.reload();

            }else{
                if(response.res_mess == true){
                    var html = `<div class="alert alert-danger" role="alert">
                ${response.res_message}
                </div>`;
                    $('.res_error').html(html);
                }
                let errors = response.messages;
                $.each(errors, function(i,item){
                    $(`.${i}`).html(item);
                });
                //show_toastr('Error', response.res_message, 'Error');
            }


        });

    });
</script>
</body>
</html>

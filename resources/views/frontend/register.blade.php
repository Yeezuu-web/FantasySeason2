<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Fantasy Season 2</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
    <link href="{{ asset('dist/css/adminlte.min.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;500&display=swap" rel="stylesheet">
    <link href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/custom1.css') }}" rel="stylesheet" />
</head>

<body style="height: auto;">
    <div class="wrapper">
        <div class="container mb-5">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <img class="banner" src="{{ asset('dist/img/FantasySeason2BannerWebsite.jpg') }}" alt="banner">
                </div>
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-4 mx-auto mb-3 title-form">
                                <p class="kh">ទម្រង់ចុះឈ្មោះ</p>
                            </div>
                            <div class="col-md-12">
                                <form id="frm_register">
                                    @csrf
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="manager_name" class="required kh mb-0"><span class="text-danger">*</span> គោត្តនាម​ និងនាម</label>
                                                <p>Manger Name</p>
                                                <input class="form-control" type="text" name="manager_name" id="manager_name" placeholder="គោត្តនាម​ និងនាម / Manager Name">
                                                <span class="invalid-feedback" id="manager_name_error"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="team_name" class="required kh mb-0"><span class="text-danger">*</span> ឈ្មោះក្រុម</label>
                                                <p>Team Name</p>
                                                <input class="form-control" type="text" name="team_name" id="team_name" placeholder="ឈ្មោះក្រុម">
                                                <span class="invalid-feedback" id="team_name_error"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="dob" class="required kh mb-0"><span class="text-danger">*</span> ថ្ងៃខែឆ្នាំកំណើត</label>
                                                <p>Day of birth</p>
                                                <input class="form-control" type="date" name="dob" id="dob" max='2010-01-01' placeholder="ថ្ងៃខែឆ្នាំកំណើត">
                                                <span class="invalid-feedback" id="dob_error"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="phone" class="required kh mb-0"><span class="text-danger">*</span> លេខទូរស័ព្ទ</label>
                                                <p>Phone</p>
                                                <input class="form-control" type="text" name="phone" id="phone">
                                                <span class="invalid-feedback" id="phone_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" style="margin-bottom: 1.8rem;">
                                                <label for="gender" class="required kh mb-0"><span class="text-danger">*</span> ភេទ</label>
                                                <p>Gender</p>
                                                <div class="icheck-primary d-inline" style="margin-right: 15px;">
                                                    <input type="radio" id="radioPrimary1" name="gender" value="Male">
                                                    <label for="radioPrimary1"​ class="kh1">
                                                        ប្រុស
                                                    </label>
                                                </div>
                                                <div class="icheck-primary d-inline" style="margin-right: 15px;">
                                                    <input type="radio" id="radioPrimary2" name="gender" value="Female">
                                                    <label for="radioPrimary2" class="kh1">
                                                        ស្រី
                                                    </label>
                                                </div>
                                                <div class="icheck-primary d-inline" style="margin-right: 15px;">
                                                    <input type="radio" id="radioPrimary3" name="gender" value="Other">
                                                    <label for="radioPrimary3" class="kh1">
                                                        មិនព័ណ៍នា
                                                    </label>
                                                </div>
                                                <br>
                                                <span class="feedback" id="gender_error"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="fan_club" class="required kh mb-0"><span class="text-danger">*</span> ក្លឹបគាំទ្រ</label>
                                                <p>Favorite Team</p>
                                                <select class="form-control" name="fan_club" id="fan_club">
                                                    <option value="">Select Favorite Team</option>
                                                    <option value="Arsenal">Arsenal</option>
                                                    <option value="Aston Villa">Aston Villa</option>
                                                    <option value="Brentford">Brentford</option>
                                                    <option value="Brighton">Brighton</option>
                                                    <option value="Burnley">Burnley</option>
                                                    <option value="Chelsea">Chelsea</option>
                                                    <option value="Crystal Palace">Crystal Palace</option>
                                                    <option value="Everton">Everton</option>
                                                    <option value="Leeds United">Leeds United</option>
                                                    <option value="Leicester City">Leicester City</option>
                                                    <option value="Liverpool">Liverpool</option>
                                                    <option value="Man City">Man City</option>
                                                    <option value="Man United">Man United</option>
                                                    <option value="Newcastle">Newcastle</option>
                                                    <option value="Norwich City">Norwich City</option>
                                                    <option value="Southampton">Southampton</option>
                                                    <option value="Tottenham Hotspur">Tottenham Hotspur</option>
                                                    <option value="Watford">Watford</option>
                                                    <option value="West Ham">West Ham</option>
                                                    <option value="Wolves">Wolves</option>
                                                </select>
                                                <span class="invalid-feedback" id="fan_club_error"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="required kh mb-0"><span class="text-danger">*</span> អ៊ីម៉ែល</label>
                                                <p>Email</p>
                                                <input class="form-control" type="email" name="email" id="email" placeholder="អ៊ីម៉ែល">
                                                <span class="invalid-feedback" id="email_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <p class="text-danger mb-3 khmer-title"><strong>*</strong>លក្ខន្តិកៈ</p>
                                            <ul>
                                                <li>1. អ្នកចូលរួមលេង ត្រូវមានសញ្ជាតិខ្មែរ និងមានអាយុចាប់ពី <strong class="text-danger">១២ឆ្នាំ</strong>ឡើងទៅ</li>
                                                <li>2. អ្នកចូលរួមលេង ត្រូវមានគណនីតែ <strong class="text-danger">មួយ(១)</strong>ប៉ុណ្ណោះក្នុង <strong style="font-weight: 500; font-family: 'Roboto', sans-serif;">CBS Fantasy League</strong></li>
                                                <li>3. អ្នកឈ្នះ ត្រូវមកទទួលរង្វាន់ដោយផ្ទាល់ និងបង្ហាញខ្លួនក្នុងកម្មវិធី <strong class="text-danger" style="font-weight: 500; font-family: 'Roboto', sans-serif;">CBS Fantasy League</strong></li>
                                                <li>4. អ្នកចូលរួមលេង មានសិទ្ធឈ្នះរង្វាន់ប្រចាំសប្តាហ៍ច្រើនដងដោយមិនកំណត់ចំនួនដងលើយ</li>
                                                <li>5. អ្នកចូលរួមលេងគ្រប់រូបមានសិទ្ធឈ្នះរង្វាន់ធំប្រចាំឆ្នាំ វៀរលែងតែបុគ្គលិក <strong class="text-danger" style="font-weight: 500; font-family: 'Roboto', sans-serif;">CBS</strong> ប៉ុណ្ណោះ</li>
                                                <li>6. អ្នកចូលរួមលេង ត្រូវចុះឈ្មោះដោយប្រើ​ <strong class="text-danger">ឈ្មោះពិត</strong> និងដាក់ឈ្មោះក្រុម
                                                    ​ឱ្យបានត្រឹមត្រូវដោយមិនប៉ះពាល់ដល់សេចក្តីថ្លៃថ្នូរបស់សង្គម</li>
                                                <li>7. <strong class="text-danger" style="font-weight: 500; font-family: 'Roboto', sans-serif;">CBS Fantasy</strong>​ មានសិទ្ធលុបចោល និងមិនផ្តល់រង្វាន់ដល់គណនីណាដែលមិនគោរពតាមលក្ខន្តិកៈ ហើយជ្រើសរើសអ្នកដែលមានពិន្ទុខ្ពស់បន្ទាប់ដែលបានគោរពលក្ខន្តិកៈមកជំនួស។</li>
                                            </ul>
                                            <div class="col-md-10 mx-auto">
                                                <p class="note"><strong class="text-danger​" style="font-weight: 500; font-family: 'Roboto', sans-serif;">CBS</strong>​ ​រក្សាសិទ្ធក្នុងការកែប្រែលក្ខន្តិកៈទាំងអស់ខាងលើដោយពុំចាំបាច់ជម្រាបជូនដំណឹងជាមុន!</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <p class="text-danger mb-3 khmer-title">បង់ប្រាក់</p>
                                            <div class="pl-3">
                                                <div class="form-group">
                                                    <label for="fan_club" class="required kh mb-0"><span class="text-danger">*</span> បង់តាម</label>
                                                    <p>Bank</p>
                                                    <select class="form-control" name="bank" id="bank">
                                                        <option value=""></option>
                                                        <option value="ABA">ABA</option>
                                                        <option value="Wing">Wing</option>
                                                        <option value="J-Trust Royal Bank">J-Trust Royal Bank</option>
                                                    </select>
                                                    <span class="invalid-feedback" id="bank_error"></span>
                                                </div>
                                                <ul style="color: rgb(163, 30, 30); user-select: text;">
                                                    <li style="font-weight: 500; font-family: 'Roboto', sans-serif;">* ABA               : <strong>000881867</strong></li>
                                                    <li style="font-weight: 500; font-family: 'Roboto', sans-serif;">* Wing              : <strong>000881867</strong></li>
                                                    <li style="font-weight: 500; font-family: 'Roboto', sans-serif;">* J-Trust Royal Bank: <strong>000881867</strong></li>
                                                    <li><span style="font-weight: 500; font-family: 'Roboto', sans-serif;">*</span> ឈ្មោះ : <strong style="font-weight: 500; font-family: 'Roboto', sans-serif;">Cambodia Broadcasting Service</strong></li>
                                                </ul>
                                                <div class="form-group">
                                                    <label for="account_name" class="required kh mb-0"><span class="text-danger">*</span> ឈ្មោះគណនី</label>
                                                    <p>Account Name</p>
                                                    <input class="form-control" type="text" name="account_name" id="account_name">
                                                    <span class="invalid-feedback" id="account_name_error"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="account_no" class="required kh mb-0"><span class="text-danger">*</span> លេខគណនី</label>
                                                    <p>Account Number</p>
                                                    <input class="form-control" type="number" name="account_no" id="account_no">
                                                    <span class="invalid-feedback" id="account_no_error"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ref_id" class="required kh mb-0"><span class="text-danger">*</span> លេខប្រតិបត្តិការ</label>
                                                    <p>Ref ID</p>
                                                    <input class="form-control" type="text" name="ref_id" id="ref_id">
                                                    <span class="invalid-feedback" id="ref_id_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center mb-5" style="">
                                            <button class="btn btn-lg btn-danger​ btn-kh" type="submit">ចុះឈ្មោះ</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="main-footer" style="margin-left: 0px;">
            <div class="float-right d-none d-sm-block">
                <b>CBS Digital</b>
            </div>
            <strong> &copy;</strong> {{ trans('global.allRightsReserved') }}
        </footer>
    </div>
    <div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h5 class="modal-title text-success" id="exampleModalLabel">បានចុះឈ្មោះជោគជ័យ</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <table class="table">
                        <tbody​>
                            <tr>
                                <th>
                                    Name: 
                                </th>
                                <td id="d-name">
                                </td>
                                <th>
                                    Team:
                                </th>
                                <td id="d-team">
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Phone: 
                                </th>
                                <td id="d-phone">
                                </td>
                                <th>
                                    Email:
                                </th>
                                <td id="d-email">
                                </td>
                            </tr>
                        </tbody​>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-family: 'Khmerkulen';">យល់ព្រម</button>
              {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
          </div>
        </div>
      </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/igorescobar-jQuery-Mask-Plugin-535b4e4/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalert2/sweetalert2/sweetalert2@10.js') }}"></script>
    <script>
        $('body').on('focus', '#phone', function(){
        var maskBehavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '0000000000' : '0000000000';
        },
        options = {
            onKeyPress: function(val, e, field, options) {
                field.mask(maskBehavior.apply({}, arguments), options);

                if(field[0].value.length >= 15){
                    var val = field[0].value.replace(/\D/g, '');
                    if(/\d\d(\d){7,8}/.test(val)){
                        field[0].value = '';
                        alert('Telefone Invalido');
                    }
                }
            }
        };
        $(this).mask(maskBehavior, options);
    });
   
    $(document).ready(function () {
        $('#frm_register').submit(function(e){
            e.preventDefault();

            let manager_name = $('#manager_name').val();
            let team_name = $('#team_name').val();
            let dob = $('#dob').val();
            let gender = $('input[name="gender"]:checked').val() ? $('input[name="gender"]:checked').val() : null;
            let fan_club = $('#fan_club').val();
            let email = $('#email').val();
            let phone = $('#phone').val();
            let _token = $('input[name="_token"]').val();

                $.ajax({
                    type: "POST",
                    url: "{{route('registering')}}",
                    data: {
                        _token: _token,
                        manager_name: manager_name,
                        team_name: team_name,
                        dob: dob,
                        gender: gender,
                        fan_club: fan_club,
                        phone: phone,
                        email: email
                    },
                    success: function (response) {
                       if(response.id){
                            let name = response.manager_name;
                            let team = response.team_name;
                            let phone = response.phone;
                            let email = response.email;
                                // Swal.fire(
                                //     'សូមអគុណ!',
                                //     name+' បានចុះឈ្មោះជោគជ័យ',
                                //     'success'
                                // )
                            $('#success').modal('toggle');
                            $('#d-name').text(name);
                            $('#d-team').text(team);
                            $('#d-phone').text(phone);
                            $('#d-email').text(email);

                       }
                    },
                    error: function(response) {
                        console.log(response);
                        if(response.responseJSON.errors.manager_name) {
                            $('#manager_name').addClass('is-invalid');
                            $('#manager_name').focus();
                            $('#manager_name_error').text('សូមពិនិត្យមើលឈ្មោះ របស់អ្នកឡើងវិញ។');
                            $('#manager_name').focus(function(){
                                $('#manager_name').removeClass('is-invalid');
                                $('#manager_name_error').text('');
                            });
                        };
                        if(response.responseJSON.errors.team_name) {
                            $('#team_name').addClass('is-invalid');
                            $('#team_name').focus();
                            $('#team_name_error').text('សូមពិនិត្យមើលឈ្មោះក្រុម របស់អ្នកឡើងវិញ។');
                            $('#team_name').focus(function(){
                                $('#team_name').removeClass('is-invalid');
                                $('#team_name_error').text('');
                            });
                        };
                        if(response.responseJSON.errors.dob) {
                            $('#dob').addClass('is-invalid');
                            $('#dob').focus();
                            $('#dob_error').text('សូមពិនិត្យមើលថ្ងៃខែឆ្នាំកំណើត របស់អ្នកឡើងវិញ។');
                            $('#dob').change(function(){
                                $('#dob').removeClass('is-invalid');
                                $('#dob_error').text('');
                            });
                        };
                        if(response.responseJSON.errors.gender) {
                            $('input[name="gender"]').addClass('is-invalid');
                            $('input[name="gender"]').focus();
                            $('#gender_error').text('សូមជ្រើសរើសភេទ ឱ្យបានត្រឹមត្រូវ។');
                            $('input[name="gender"]').change(function(){
                                $('#gender').removeClass('is-invalid');
                                $('#gender_error').text('');
                            });
                        };
                        if(response.responseJSON.errors.fan_club) {
                            $('#fan_club').addClass('is-invalid');
                            $('#fan_club').focus();
                            $('#fan_club_error').text('សូមជ្រើសរើសក្លឹបគាំទ្រ ឱ្យបានត្រឹមត្រូវ។');
                            $('#fan_club').change(function(){
                                $('#fan_club').removeClass('is-invalid');
                                $('#fan_club_error').text('');
                            });
                        };
                        if(response.responseJSON.errors.email) {
                            $('#email').addClass('is-invalid');
                            $('#email').focus();
                            if(response.responseJSON.errors.email[0] === 'The email has already been taken.') {
                                $('#email_error').text('អ៊ីម៉ែលនេះ បានចុះឈ្មោះម្តងហើយ។​ សូមពិនិត្យឡើងវិញ។');
                            }else{
                                $('#email_error').text('សូមពិនិត្យមើលអ៊ីម៉ែល របស់អ្នកឡើងវិញ។');
                            };
                            $('#email').focus(function(){
                                $('#email').removeClass('is-invalid');
                                $('#email_error').text('');
                            })
                        };
                        if(response.responseJSON.errors.phone) {
                            $('#phone').addClass('is-invalid');
                            $('#phone').focus();
                            if(response.responseJSON.errors.phone[0] === 'The phone has already been taken.') {
                                $('#phone_error').text('លេខទូរស័ព្ទនេះ បានចុះឈ្មោះម្តងហើយ។​ សូមពិនិត្យឡើងវិញ។');
                            }else{
                                $('#phone_error').text('សូមពិនិត្យមើលលេខទូរស័ព្ទ របស់អ្នកឡើងវិញ។');
                            };
                            $('#phone').focus(function(){
                                $('#phone').removeClass('is-invalid');
                                $('#phone_error').text('');
                            })
                        };
                        if(response.responseJSON.errors.phone) {
                            $('#bank').addClass('is-invalid');
                            $('#bank').focus();
                            if(response.responseJSON.errors.bank[0] === 'The bank has already been taken.') {
                                $('#bank_error').text('លេខទូរស័ព្ទនេះ បានចុះឈ្មោះម្តងហើយ។​ សូមពិនិត្យឡើងវិញ។');
                            }else{
                                $('#bank_error').text('សូមពិនិត្យមើលលេខទូរស័ព្ទ របស់អ្នកឡើងវិញ។');
                            };
                            $('#bank').focus(function(){
                                $('#bank').removeClass('is-invalid');
                                $('#bank_error').text('');
                            })
                        };
                        if(response.responseJSON.errors.phone) {
                            $('#account_name').addClass('is-invalid');
                            $('#account_name').focus();
                            if(response.responseJSON.errors.account_name[0] === 'The account name has already been taken.') {
                                $('#account_name_error').text('ឈ្មោះគណនីនេះ បានចុះឈ្មោះម្តងហើយ។​ សូមពិនិត្យឡើងវិញ។');
                            }else{
                                $('#account_name_error').text('សូមពិនិត្យមើលឈ្មោះគណនី របស់អ្នកឡើងវិញ។');
                            };
                            $('#account_name').focus(function(){
                                $('#account_name').removeClass('is-invalid');
                                $('#account_name_error').text('');
                            })
                        };
                        if(response.responseJSON.errors.phone) {
                            $('#account_no').addClass('is-invalid');
                            $('#account_no').focus();
                            if(response.responseJSON.errors.account_no[0] === 'The account no has already been taken.') {
                                $('#account_no_error').text('លេខគណនីនេះ បានចុះឈ្មោះម្តងហើយ។​ សូមពិនិត្យឡើងវិញ។');
                            }else{
                                $('#account_no_error').text('សូមពិនិត្យមើលលេខគណនី របស់អ្នកឡើងវិញ។');
                            };
                            $('#account_no').focus(function(){
                                $('#account_no').removeClass('is-invalid');
                                $('#account_no_error').text('');
                            })
                        };
                        if(response.responseJSON.errors.ref_id) {
                            $('#ref_id').addClass('is-invalid');
                            $('#ref_id').focus();
                            if(response.responseJSON.errors.ref_id[0] === 'The ref id has already been taken.') {
                                $('#ref_id_error').text('លេខប្រតិបត្តិការនេះ បានចុះឈ្មោះម្តងហើយ។​ សូមពិនិត្យឡើងវិញ។');
                            }else{
                                $('#ref_id_error').text('សូមពិនិត្យមើលលេខប្រតិបត្តិការ​ របស់អ្នកឡើងវិញ។');
                            };
                            $('#ref_id').focus(function(){
                                $('#ref_id').removeClass('is-invalid');
                                $('#ref_id_error').text('');
                            });
                        };
                    }
                });
            })
        });
    </script>
</body>

</html>

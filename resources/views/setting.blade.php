
@extends('layouts.main_layout')

@section('content')
    <div class="setting-body">
        <div class="setting-window">
            <div class="setting-header"><h3>Profile Edit</h3></div>
            <div class="setting-content">
                    <form method="POST" action="{{ url('/student/setting/update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="setting-profile">
                            <div class="sp-1">
                                <div class="pfp-box">
                                    <img src="{{ isset($student) && $student->ImagePath ? asset('temporary_student_images/' . $student->ImagePath) : '/temporary_student_images/pfp1.jpg' }}" id="mypfp">
                                </div>
                                <h1>
                                    @if(isset($student))
                                        {{ $student->FirstName }} {{ $student->MiddleInitial }} {{ $student->LastName }}
                                    @endif
                                </h1>
                                <button id="change-pfp-btn" type="button"><img src="/images/camera.png" id="cam-icn">Change Avatar</button>
                                <input type="file" name="avatar" id="avatar-input" accept="image/*" style="display:none;">
                            </div>
                            <div class="sp-2">
                                <label for="FirstName">First Name
                                    @if($errors->has('FirstName'))
                                        ({{ $errors->first('FirstName') }})
                                    @endif
                                </label>
                                <input type="text" name="FirstName" id="FirstName" value="{{ old('FirstName', $student->FirstName ?? '') }}" required>
                            </div>
                            <div class="sp-2">
                                <label for="LastName">Last Name
                                    @if($errors->has('LastName'))
                                        ({{ $errors->first('LastName') }})
                                    @endif
                                </label>
                                <input type="text" name="LastName" id="LastName" value="{{ old('LastName', $student->LastName ?? '') }}" required>
                            </div>
                            <div class="sp-2">
                                <label for="MiddleInitial">Middle Initial
                                    @if($errors->has('MiddleInitial'))
                                        ({{ $errors->first('MiddleInitial') }})
                                    @endif
                                </label>
                                <input type="text" name="MiddleInitial" id="MiddleInitial" value="{{ old('MiddleInitial', $student->MiddleInitial ?? '') }}">
                            </div>
                            <div class="sp-2">
                                <label for="gmail">Email
                                    @if($errors->has('gmail'))
                                        ({{ $errors->first('gmail') }})
                                    @endif
                                </label>
                                <input type="email" name="gmail" id="gmail" value="{{ old('gmail', $student->gmail ?? '') }}">
                            </div>
                            <div class="sp-2">
                                <label for="Password">Change Password
                                    @if($errors->has('Password'))
                                        ({{ $errors->first('Password') }})
                                    @endif
                                </label>
                                <input type="password" name="Password" id="Password" placeholder="Change Password">
                            </div>
                            <div class="sp-2">
                                <label for="Password_confirmation">Confirm Password
                                    @if($errors->has('Password_confirmation'))
                                        ({{ $errors->first('Password_confirmation') }})
                                    @endif
                                    @if($errors->has('Password'))
                                        @if(str_contains($errors->first('Password'), 'confirmation'))
                                            (Password doesn\'t match)
                                        @endif
                                    @endif
                                </label>
                                <input type="password" name="Password_confirmation" id="Password_confirmation" placeholder="Confirm Password">
                            </div>
                            <div class="sp-3">
                                <button type="submit">Save Changes</button>
                            </div>
                        </div>
                    </form>
                <div class="setting-tos">
                    <div class="tos">
                        <div class="tos-box">
                            <h2>Terms and Conditions</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque dolorum explicabo quas soluta numquam, deleniti fugiat illo iure eligendi architecto, adipisci libero nihil earum aperiam doloremque accusamus error quo sunt incidunt molestiae minima rerum? Sit at tempora, aliquid quasi ad nihil, laborum eaque repudiandae voluptates vitae iusto repellat quis autem consectetur molestiae impedit? Placeat qui eaque asperiores excepturi facere deserunt, soluta expedita commodi. Repudiandae, officiis nemo temporibus mollitia iusto aperiam ab ipsum odio dolore cumque et corporis, ullam perferendis natus iure praesentium? Inventore iure, facilis, qui fuga, neque ipsam reprehenderit dolores mollitia repudiandae aut sequi! Voluptatibus provident ea quo, nemo fuga est sed unde nesciunt doloribus a reprehenderit ab id rem. Fuga officiis aliquid corporis possimus, consequuntur dignissimos alias enim dolor, modi debitis maxime, repudiandae quod iste velit. Temporibus earum commodi qui veniam eligendi, possimus modi reprehenderit asperiores? Amet aliquam quo, iure laudantium consequuntur eius facere vero autem, rerum odit dolore itaque maiores, accusamus iste veniam aut. Molestias, quia eius ut minima tempore blanditiis dignissimos sint delectus tenetur quaerat quo minus corrupti architecto a maiores et. Dignissimos vitae consequatur nemo, magnam repellat magni eos cupiditate corporis praesentium. Sint, ipsa, iure quia obcaecati consequuntur dolorem cum nisi quos unde aspernatur odit quam, sapiente suscipit culpa quae veniam vel praesentium consectetur? Suscipit, deleniti hic iste autem similique consequatur in dicta iure? Mollitia ducimus minus at ex ipsum dolorum aspernatur. Eaque ipsam nesciunt nihil debitis? Tempore saepe doloribus, suscipit, ex similique modi ut architecto deserunt sapiente quas nulla aut repellat nihil? Dolorem earum reprehenderit porro qui, suscipit quam, fugit perspiciatis voluptatibus quisquam similique tenetur alias, laborum maiores corrupti dolores! Neque quibusdam, saepe provident veritatis, maiores quam esse aut voluptates dolores omnis accusantium unde totam blanditiis repellat. Deleniti modi non laboriosam repudiandae quae omnis pariatur minima earum aperiam ut voluptatem consequuntur, recusandae rerum iste ipsam possimus repellendus quidem, totam sunt. Omnis, ad. Beatae laborum saepe distinctio? Possimus reiciendis quam consequatur saepe, sit eum non at quo praesentium mollitia dolorem ducimus odit voluptas velit labore! Nisi a repellat facere, vitae quos amet! Praesentium placeat magnam, corporis impedit illo nihil aut, eveniet totam minus repudiandae, aliquam exercitationem in voluptatibus porro eos ut at inventore eius. Doloribus ab quasi neque aut cumque et fugit recusandae atque, nulla maiores excepturi commodi enim blanditiis illo quis? Voluptatibus, at iste adipisci, consequuntur officiis, culpa esse eos delectus officia autem ut! Earum recusandae voluptatibus voluptates nam quisquam soluta iusto incidunt cupiditate.</p>
                            <span class="tos-check">
                                <input type="checkbox" name="accept_tos" id="accept_tos">
                                <label for="accept_tos">I agree to the Terms and Conditions</label>
                            </span>
                            <span class="tos-check">
                                <input type="checkbox" name="accept_privacy" id="accept_privacy">
                                <label for="accept_privacy">I agree to the Privacy Policy</label>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

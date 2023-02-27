<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mastersystem Infotama</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('dist/img/logo.png')}}">
    <link rel="stylesheet" href="{{asset('dist/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.min.css">
</head>
<body>
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img class="logo-master" src="{{ asset('dist/img/logo.png')}}" alt="">
    </nav>
    <div class="container">
        {{-- form input --}}
        <div class="card" style="width: 18rem;">
            <div class="card-header">
                Form Registrasi
            </div>
            <form id="form" action="{{url('/proses-registrasi')}}" method="post">
            @csrf
            <div class="card-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama"  class="form-control @error('nama') is-invalid @enderror" pattern="^[A-Z][a-zA-Z\s'-]{1,100}$" value="{{old('nama')}}" id="nama" required>
                        @error('nama') 
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            {{$message}} 
                        </div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <div class="checkbox-group ">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki" id="laki_laki" required>
                                <label class="form-check-label" for="laki_laki">
                                    Laki-Laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" id="perempuan" required>
                                <label class="form-check-label" for="perempuan">
                                    Perempuan
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Hobi</label>
                        @error('hobi') 
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            {{$message}} 
                        </div>
                        @enderror
                        <div class="form-check">
                            <input class="form-check-input" name="hobi[]" type="checkbox" value="Sepak Bola" id="sepakbola" >
                            <label class="form-check-label" for="sepakbola">
                                Sepak Bola
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="hobi[]" type="checkbox" value="Musik" id="musik" >
                            <label class="form-check-label" for="musik">
                                Musik
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="hobi[]" type="checkbox" value="Membaca" id="membaca">
                            <label class="form-check-label" for="membaca">
                                Membaca
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" pattern="^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+[.]+[a-zA-Z]{2,10}$" value="{{old('email')}}" id="email" required>
                        @error('email') 
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            {{$message}} 
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="telp" class="form-label">Telpon</label>
                        <input type="number" name="telp" class="form-control @error('telp') is-invalid @enderror" pattern="[0-9]" value="{{old('telp')}}" id="telp" required>
                        @error('telp') 
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            {{$message}} 
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" maxlength="10" name="username" class="form-control @error('username') is-invalid @enderror" pattern="^[a-z0-9_-]{0,10}$" value="{{old('username')}}" id="username" required>
                        @error('username') 
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            {{$message}} 
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" minlength="7" name="password" class="form-control @error('password') is-invalid @enderror" pattern=".{7,}"  value="{{old('password')}}" id="password" required>
                        @error('password') 
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            {{$message}} 
                        </div>
                        @enderror
                    </div>
                
            </div>
            <div class="card-footer text-center">
                <button type="submit" onClick="simpan()" id="btnSubmit" class="btn btn-success">Daftar</button>
                <button type="button" onClick="hapus()" class="btn btn-secondary">Reset</button>
            </div>
            </form>
        </div>
        {{-- table data --}}
        <div class="card card-tabel">
             <div class="card-header">
                Data registrasi
            </div>
             <div class="card-body">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Hobi</th>
                            <th scope="col">Telp</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Hapus</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($user as $item)
                        <tr>
                            <td>{{$no++;}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->jenis_kelamin}}</td>
                            <td>{{$item->hobi}}</td>
                            <td>{{$item->telp}}</td>
                            <td>{{$item->username}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->password}}</td>
                            <td><a href="{{url('/hapus-registrasi/'.$item->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="{{asset('dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('dist/js/jquery.js')}}"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
        
        function simpan(){
            var membaca = $('#membaca').prop('checked');
            var musik = $('#musik').prop('checked');
            var sepak_bola = $('#sepakbola').prop('checked');
            if(membaca == false && musik == false && sepak_bola == false ){
                alert( "Pilih salah satu hobi");
            }
        }
        function hapus(){
            $('#nama').val('');
            $('#email').val('');
            $('#telp').val('');
            $('#username').val('');
            $('#password').val('');
            $('#perempuan').prop( "checked", false );
            $('#laki_laki').prop( "checked", false );
            $('#membaca').prop( "checked", false );
            $('#musik').prop( "checked", false );
            $('#sepakbola').prop( "checked", false );
        }

    </script>
    @if (session()->has('notif'))
        <script>
                Swal.fire(
                '{{session()->get('notif')}} data berhasil',
                'You clicked the button!',
                'success'
                );
        </script>
    @endif
</body>
</html>
@extends('layouts.app')
@section('title','INFO')
@section('content')
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center" >
<div class="col-xl-6 col-md-12">
                                                <div class="card2 user-card-full">
                                                    <div class="row m-l-0 m-r-0">
                                                        <div class="col-sm-4 bg-c-lite-green user-profile">
                                                            <div class="card-block text-center text-white">
                                                                <div class="m-b-25">
                                                                    <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image">
                                                                </div>
                                                                <h6 class="f-w-600" style="color:white; font-weight:400; text-transform:uppercase;">{{$data['nom']}} {{$data['prenom']}}</h6>
                                                                @if ($user->is_admin ==1)<p style="color:white; font-weight:300;">Administrateur</p>
                                                                @else <p style="color:white; font-weight:300;">Utilisateur</p>
                                                                @endif
                                                                <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="card-block">
                                                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Informations</h6>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">CIN</p>
                                                                        <h6 class="text-muted f-w-400">{{$data['cin']}}</h6>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">Date de naissance</p>
                                                                        <h6 class="text-muted f-w-400">{{$data['date_de_naissance']}}</h6>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">N° téléphone</p>
                                                                        <h6 class="text-muted f-w-400">+212{{$data['telephone']}}</h6>
                                                                    </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">Email</p>
                                                                        <h6 class="text-muted f-w-400">{{$user['email']}}</h6>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">Mot de passe</p>
                                                                        <h6 class="text-muted f-w-400">************</h6>
                                                                    </div>
                                                                    
                                                                </div>
                                                               
                                                                </div>
                                                                <div class="button-container">
                                                                   <a href="{{route('data.edit',$data['id'])}}" class="btn" style="margin-left:60px; width:30%;"><center>Modifier</center></a> 
                                                                   
                                                                    <form class="form" action="{{route('data.destroy',$data['id'])}}" method="post">{{-- aller vers destroy() + envoyer l'id avec --}}
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger submit" style="width:35%; "><center>Supprimer</center></button>
                                                                    </form>
                                                                </div>
                                                               
                                                                
                                                                <ul class="social-link list-unstyled m-t-40 m-b-10">
                                                                    <input type="text" value="_______________________________________________________________________________________" readonly style="color:#F7FAFC; background-color:#F7FAFC">
                                                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             </div>
                                                </div>
                                            </div>
                                            @endsection
@section('title', 'Partner Table')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Event</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Event</li>
        <li class="breadcrumb-item active">Partner data</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    @if (session()->has('message'))
      <div class="alert alert-success alert-dismissible fade show position-fixed top-0 end-0 m-5" role="alert" style="z-index: 2000">
        <strong>{{ session('message') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <div class="row">
      <div class="col-lg-12">
        <a type="button" class="btn btn-get-started mt-1 mb-4 mx-auto" wire:click="create()">Create</a>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Usser</th>
              <th scope="col">Phone</th>
              <th scope="col">Email</th>
              <th scope="col">Partner <br>Name</th>
              <th scope="col">body</th>
              <th scope="col">link</th>
              <th scope="col">Action</th>

            </tr>
          </thead>
          <tbody>
          @foreach($users as $user)
            @forelse($user->partners as $partner)
            <tr>
              <th scope="row col-md-3">{{ $loop->parent->index + 1 }}</th>
              <td>{{$user->name}}</td>
              <td>{{$user->phone ? $user->phone : 'not' }}</td>
              <td>{{$user->email}}</td>
              <td>{{$partner->name ? $partner->name : 'not' }}</td>
              <td>{{$partner->body ? $partner->body : 'not' }}</td>
              <td>{{$partner->link ? $partner->link : 'not' }}</td>
              <td>
                <a type="button" class="btn btn-primary text-dark" wire:click="edit({{ $user->id }}, {{ $partner->id }})">Edit</a>
                <a type="button" class="btn btn-danger text-dark" wire:click="delete({{ $user->id }})">Delete</a>
              </td>
            </tr>
            @empty
            <tr>
              <th scope="row col-md-3">1</th>
              <td>{{$user->name}}</td>
              <td>{{$user->phone ? $user->phone : 'not' }}</td>
              <td>{{$user->email}}</td>
              <td>Not Partner</td>
              <td>Not Partner</td>
              <td>Not Partner</td>
              <td>
                <a type="button" class="btn btn-primary text-dark" wire:click="edit({{ $user->id }}, null)">Edit</a>
                <a type="button" class="btn btn-danger text-dark" wire:click="delete({{ $user->id }})">Delete</a>
              </td>
            </tr>
            @endforelse
          @endforeach
          </tbody>
        </table>
        @if($isModalOpen)
            <div class="modal fade show" style="display: block;" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" role="dialog" aria-modal="true">
              <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Partner Information</h5>
                    <button type="button" class="btn-close" aria-label="Close" wire:click="closeModalPopover()"></button>
                  </div>
                  <div class="modal-body row">
                    <form class="row" wire:submit.prevent="store()" enctype="multipart/form-data">
                      <div class="mb-3 col-12 col-sm-6 col-md-4">
                        <label for="exampleInputName" class="form-label">User Name</label>
                        <input type="text" class="form-control" id="exampleInputName" wire:model.defer='userName' aria-describedby="nameHelp">
                        <div id="nameHelp" class="form-text">enter the User's name.</div>
                      </div>

                      <div class="mb-3 col-12 col-sm-6 col-md-4">
                        <label for="exampleInputPartnerName" class="form-label">Partner Name</label>
                        <input type="text" class="form-control" id="exampleInputPartnerName" wire:model.defer='partnerName' aria-describedby="partnerNameHelp">
                        <div id="partnerNameHelp" class="form-text">enter the partner's name.</div>
                      </div>

                      <div class="mb-3 col-12 col-sm-6 col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" wire:model.defer='email' aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">enter the User's email.</div>
                      </div>

                      <div class="mb-3 col-12 col-sm-6 col-md-4">
                        <label for="exampleInputPhone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="exampleInputPhone" wire:model.defer='phone' aria-describedby="phoneHelp">
                        <div id="phoneHelp" class="form-text">enter the user's phone.</div>
                      </div>

                      <div class="mb-3 col-12 col-sm-6 col-md-4">
                        <label for="exampleInputBody" class="form-label">Body</label>
                        <textarea class="form-control" id="exampleInputBody" rows="1" wire:model.defer='body' aria-describedby="bodyHelp"></textarea>
                        <div id="bodyHelp" class="form-text">enter the partner's Body Information's.</div>
                      </div>

                      <div class="mb-3 col-12 col-sm-6 col-md-4">
                        <label for="exampleInputLink" class="form-label">Link</label>
                        <input type="text" class="form-control" id="exampleInputLink" wire:model.defer='link' aria-describedby="linkHelp">
                        <div id="linkHelp" class="form-text">enter the partner's url link.</div>
                      </div>

                      <div class="col-12 col-sm-6 col-md-4 mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input class="form-control" type="file" wire:model.defer='image'>
                        <p class="small text-muted py-0 my-0">Select 1 image file type: Png, Jpg, Jpeg, Svg o Gif.</p>
                        <!-- id="image" name="image" -->
                        
                        <div wire:loading wire:target='image'>Uploading...</div>
                        
                        @error('image')
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>There is a problem with the file type, please select an image file type: Png, Jpg, Jpeg, Svg o Gif</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @enderror
                        @error('image')
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @enderror
                      </div>
                      
                      <div class="col-12 col-sm-6 col-md-4 mb-3">
                        <label for="gifcard1" class="form-label">Gifcard1</label>
                        <input class="form-control" type="file" wire:model.defer='gifcard1'>
                        <p class="small text-muted py-0 my-0">Select 1 image file type: Png, Jpg, Jpeg, Svg o Gif.</p>
                        <!-- id="image" name="image" -->
                        
                        <div wire:loading wire:target='gifcard1'>Uploading...</div>
                        
                        @error('gifcard1')
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>There is a problem with the file type, please select an image file type: Png, Jpg, Jpeg, Svg o Gif</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @enderror
                        @error('gifcard1')
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @enderror
                      </div>

                      <div class="col-12 col-sm-6 col-md-4 mb-3">
                        <label for="gifcard2" class="form-label">Gifcard2</label>
                        <input class="form-control" type="file" wire:model.defer='gifcard2'>
                        <p class="small text-muted py-0 my-0">Select 1 image file type: Png, Jpg, Jpeg, Svg o Gif.</p>
                        <!-- id="image" name="image" -->
                        
                        <div wire:loading wire:target='gifcard2'>Uploading...</div>
                        
                        @error('gifcard2')
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>There is a problem with the file type, please select an image file type: Png, Jpg, Jpeg, Svg o Gif</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @enderror
                        @error('gifcard2')
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @enderror
                      </div>

                      <div class="col-12 col-sm-6 col-md-4 mb-3">
                        <label for="gifcard3" class="form-label">Gifcard3</label>
                        <input class="form-control" type="file" wire:model.defer='gifcard3'>
                        <p class="small text-muted py-0 my-0">Select 1 image file type: Png, Jpg, Jpeg, Svg o Gif.</p>
                        <!-- id="image" name="image" -->
                        
                        <div wire:loading wire:target='gifcard3'>Uploading...</div>
                        
                        @error('gifcard3')
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>There is a problem with the file type, please select an image file type: Png, Jpg, Jpeg, Svg o Gif</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @enderror
                        @error('gifcard3')
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @enderror
                      </div>

                      <div class="col-12 col-sm-6 col-md-4 mb-3">
                        <label for="cupon1" class="form-label">Cupon1</label>
                        <input class="form-control" type="file" wire:model.defer='cupon1'>
                        <p class="small text-muted py-0 my-0">Select 1 image file type: Png, Jpg, Jpeg, Svg o Gif.</p>
                        <!-- id="image" name="image" -->
                        
                        <div wire:loading wire:target='cupon1'>Uploading...</div>
                        
                        @error('cupon1')
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>There is a problem with the file type, please select an image file type: Png, Jpg, Jpeg, Svg o Gif</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @enderror
                        @error('cupon1')
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @enderror
                      </div>

                      <div class="col-12 col-sm-6 col-md-4 mb-3">
                        <label for="cupon2" class="form-label">Cupon2</label>
                        <input class="form-control" type="file" wire:model.defer='cupon2'>
                        <p class="small text-muted py-0 my-0">Select 1 image file type: Png, Jpg, Jpeg, Svg o Gif.</p>
                        <!-- id="image" name="image" -->
                        
                        <div wire:loading wire:target='cupon2'>Uploading...</div>
                        
                        @error('cupon2')
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>There is a problem with the file type, please select an image file type: Png, Jpg, Jpeg, Svg o Gif</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @enderror
                        @error('cupon2')
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @enderror
                      </div>

                      <div class="col-12 col-sm-6 col-md-4 mb-3">
                        <label for="cupon3" class="form-label">Cupon3</label>
                        <input class="form-control" type="file" wire:model.defer='cupon3'>
                        <p class="small text-muted py-0 my-0">Select 1 image file type: Png, Jpg, Jpeg, Svg o Gif.</p>
                        <!-- id="image" name="image" -->
                        
                        <div wire:loading wire:target='cupon2'>Uploading...</div>
                        
                        @error('cupon3')
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>There is a problem with the file type, please select an image file type: Png, Jpg, Jpeg, Svg o Gif</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @enderror
                        @error('cupon3')
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @enderror
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModalPopover()" >Close</button>
                    <button type="submit" wire:loading.class="disabled" wire:loading.attr="disabled" class="btn btn-primary" wire:click="store()">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
        @endif
      </div>
    </div>
  </section>
</main><!-- End #main -->
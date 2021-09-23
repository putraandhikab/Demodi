@extends('utama')
@section('content')

<main class="content">
    <div class="container p-0">
		<h1 class="h3 mb-3">Messages</h1>
		<div class="card">
			<div class="row g-0">
				<div class="col-12 col-lg-5 col-xl-3 border-right">

					<div class="px-4 d-none d-md-block">
						<div class="d-flex align-items-center">
							<div class="flex-grow-1">
								<input type="text" class="form-control my-3" placeholder="Search...">
							</div>
						</div>
					</div>
					<a href="" class="list-group-item list-group-item-action border-0">
						<div class="badge bg-success float-right"></div>
						<div class="d-flex align-items-start">
							<img src="images/1631504333.gif" class="rounded-circle mr-1" width="40" height="40">
							<div class="flex-grow-1 ml-3">
								Shankara
								<div class="small"><span class="fas fa-circle chat-online"></span> Online</div>
							</div>
						</div>
					</a>
					@foreach ($sales as $item)
					<a href="" class="list-group-item list-group-item-action border-0">
						<div class="badge bg-success float-right">1</div>
						<div class="d-flex align-items-start">
							<img src="images/{{ $item->foto }}" class="rounded-circle mr-1"  width="40" height="40">
							<div class="flex-grow-1 ml-3">
								{{ $item->nama_sales }}
								<div class="small"><span class="fas fa-circle chat-offline"></span> Offline</div>
							</div>
						</div>
					</a> 
					@endforeach

					<hr class="d-block d-lg-none mt-1 mb-0">
				</div>
				<div class="col-12 col-lg-7 col-xl-9">
					<div class="py-2 px-4 border-bottom d-none d-lg-block">
						<div class="d-flex align-items-center py-1">
							<div class="position-relative">
								<img src="images/1631504333.gif" class="rounded-circle mr-1"  width="40" height="40">
							</div>
							<div class="flex-grow-1 pl-3">
								<strong>Shankara</strong>
								<div class="text-muted small"><em>Typing...</em></div>
							</div>
						</div>
					</div>

					<div class="position-relative">
						<div class="chat-messages p-4">

							<div class="chat-message-left pb-4">
								<div>
									<img src="images/1631504333.gif" class="rounded-circle mr-1"  width="40" height="40">
									<div class="text-muted small text-nowrap mt-2">11:20 AM</div>
								</div>
								<div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
									<div class="font-weight-bold mb-1">Shankara</div>
									Selamat Pagi, saya mau cek stok
								</div>
							</div>

							<div class="chat-message-right mb-4">
								<div>
									<img src="images/{{ Auth::user()->foto }}" class="rounded-circle mr-1"  width="40" height="40">
									<div class="text-muted small text-nowrap mt-2">11:21 AM</div>
								</div>
								<div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
									<div class="font-weight-bold mb-1">You</div>
									Hai
								</div>
							</div>

							<div class="chat-message-right mb-4">
								<div>
									<img src="images/{{ Auth::user()->foto }}" class="rounded-circle mr-1" \ width="40" height="40">
									<div class="text-muted small text-nowrap mt-2">11:21 AM</div>
								</div>
								<div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
									<div class="font-weight-bold mb-1">You</div>
									Terima kasih telah menghubungi kami.
								</div>
							</div>
						</div>
					</div>
					<div class="flex-grow-0 py-3 px-4 border-top">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Type your message">
							<button class="btn btn-primary">Send</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

@endsection
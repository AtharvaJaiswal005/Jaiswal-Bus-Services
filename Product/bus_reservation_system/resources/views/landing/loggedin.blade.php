<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Reservation System</title>
    <link rel="icon" href="assets/img/brand/favicon.png" type="image/png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="assets/vendor/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="    https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="assets/vendor/quill/dist/quill.core.css">
    <link rel="stylesheet" href="assets/css/argon.css?v=1.1.0" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
</head>

<body>
    @php
        if(Session::has('error')){
            toast(session::get('error'),session::get('error_type'));
            session()->forget('error');
        
        }elseif(Session::has('success')){
            toast(session::get('success'),'success');
            session()->forget('success');
        }
    @endphp
        <!-- nav -->
   <!-- header nav  -->
   <header class="text-gray-600 body-font">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <span class="ml-3 text-xl"> <h1 class="title-font font-medium text-3xl text-gray-900"><a href="index.php">Jaiswal Bus Services</a></h1>
            </span>
          </a>
          <nav class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400	flex flex-wrap items-center text-base justify-center">
            <a class="mr-5 hover:text-gray-900"><a href="url">Bus Ticket</a>
        </a>
            <a class="mr-5 hover:text-gray-900"><a href="url">Hire Bus</a>
        </a>
          </nav>
          <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
            <a class="mr-5 hover:text-gray-900"><a href="url">My Booking</a>
        </a>
                    <a class="mr-5 hover:text-gray-900 mr--1"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg></a>
        </a>
           <!-- drop down -->
           <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
           <div @click.away="open = false" class="relative" x-data="{ open: false }">
        <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
          <span class="ml--1" > <?php echo $_SESSION['firstname']; ?> </span>
          <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
          <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
            <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="sign_out.php">Sign Out</a>
          </div>
        </div>

    
            <a class="mr-5 hover:text-gray-900"><a></a>
        </a>
         
          </nav>
          <a href="contact_us.php">
          <button class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0" ><a href="contact_us.php">Contact US</a>

            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </button>
          </a>
        </div>
      </header>

        <hr>
<!-- nav  -->

    <div class="container mt-4">
        <div class="card ">
            <div style="padding-top: 100px; padding-bottom: 80px;" class="card-body">
                <form action="{{ route('search_route') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <select name="city_1" id="" class="form-control @error('city_1') is-invalid @enderror" data-toggle="select">
                                <option selected disabled>Select Start Destination</option>
                                @foreach ($city_details as $city)
                                    <option value="{{ $city->city_id }}"> {{ $city->city_name }} </option>
                                @endforeach
                            </select>
                            @error('city_1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <select name="city_2" id="" class="form-control @error('city_2') is-invalid @enderror" data-toggle="select">
                                <option selected disabled>Select End Destination</option>
                                @foreach ($city_details as $city)
                                    <option value="{{ $city->city_id }}"> {{ $city->city_name }} </option>
                                @endforeach
                            </select>
                            @error('city_2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <input type="date" name="res_date" id="" class="form-control @error('res_date') is-invalid @enderror">
                            @error('res_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <button type="submit" class="btn btn-block btn-success">Find Buses</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @php
            
            if (isset($first_route)) {
                foreach($first_route as $first){
                    $route_details= App\Models\RouteCityPrice::where([['route_id', $first->route_id], ['city_id', $end_city]])->get();
                }
            }
        @endphp
        
        @if (isset($route_details))
        <div class="card">
            <div class="card-header">
                <h2>Bus List for {{ $city_start->city_name }} to {{ $city_end->city_name }} - {{ $res_date }}</h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Bus Name</th>
                            <th scope="col">Start Time</th>
                            <th scope="col">End Time</th>
                            <th scope="col">Price</th>
                            <th scope="col">Available Seets</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        
                        @foreach ($route_details as $route)
                            @php
                                $start_city_price = App\Models\RouteCityPrice::where([['city_id', $start_city], ['route_id', $route->route_id]])->first()->price;
                                $end_city_price = App\Models\RouteCityPrice::where([['city_id', $end_city], ['route_id', $route->route_id]])->first()->price;
                                $route_price = ($end_city_price - $start_city_price);

                                $bus_route_info = App\Models\BusRoute::find($route->route_id);
                                $bus_details = App\Models\Bus::find($bus_route_info->bus_id);

                                $booked_seat_count = App\Models\Reservation::where([['route_id', $route->route_id], ['status', '!=','4'], ['reservation_date', $res_date]])->sum('seats_count');
                                $available_seats = ($bus_details->bus_no_seats - $booked_seat_count);
                            @endphp

                            @if($route_price > 0)
                                <tr>
                                    <th scope="row">{{ $route->route_id }}</th>
                                    <td>{{ $bus_details->bus_name }}</td>
                                    <td>{{ $bus_route_info->start_time }}</td>
                                    <td>{{ $bus_route_info->end_time }}</td>
                                    <td>{{ $route_price }}</td>
                                    <td><span class="badge badge-success"></span>{{ $available_seats }}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm btn-contact" bus-id="{{ $bus_details->bus_id }}" bus-contact="{{ $bus_details->bus_contact_no }}" type="button">Contact</button>
                                        <form action="{{ route('temp_data') }}" method="POST" id="res-form">
                                            @csrf
                                            <input type="hidden" name="res_date" id="res_date" value="">
                                            <input type="hidden" name="bus_id" id="bus_id" value="">
                                            <input type="hidden" name="from_id" id="from_id" value="">
                                            <input type="hidden" name="to_id" id="to_id" value="">
                                            <input type="hidden" name="route_id" id="route_id" value="">
                                            <input type="hidden" name="route_price" id="route_price" value="">

                                            <button class="btn btn-success btn-sm btn-reserve" 
                                                    res_date="{{ $res_date }}"
                                                    bus_id="{{ $bus_details->bus_id }}" 
                                                    start_id="{{ $city_start->city_id }}"
                                                    end_id="{{ $city_end->city_id }}"
                                                    route_id ="{{ $route->route_id }}"
                                                    route_price ="{{ $route_price }}"
                                                type="button">Reserve</button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif

    <!-- Modal contact -->
    <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Contact Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Name : <b><span id="bus_name"></span></b><br>
                    Contact No : <b><span id="bus_con"></span></b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Done</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal reserve -->
    <div class="modal fade" id="reserve" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Rservation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('reserve_bus') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="">Reservation Date :</label>
                                <input type="date" name="res_date" id="" value="" class="form-control res_date" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="">Bus Name :</label>
                                <input type="text" name="" id="" value=""" class="form-control bus_name" readonly required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">Start Destination :</label>
                                <input type="text" name="" id="" value="" class="form-control from" readonly required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">End Destination :</label>
                                <input type="text" name="" id="" value="" class="form-control to" readonly required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="">Name :</label>
                                <input type="text" name="clnt_name" id="" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="">NIC :</label>
                                <input type="text" name="clnt_nic" id="" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="">Contact Number :</label>
                                <input type="number" name="clint_contact_no" id="" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="">How many seats do you need to reserve? :</label>
                                <input type="number" name="no_of_seats" id="" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="from" class="from_id">
                        <input type="hidden" name="to" class="to_id">
                        <input type="hidden" name="route_id" class="route_id">
                        <input type="hidden" name="route_price" class="route_price">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send Reservation Request</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
             <!-- Blog on Services -->
             <section class="text-gray-600 body-font " >
                          <div class="container px-5 py-24 mx-auto flex flex-wrap ">
                            <div class="flex flex-wrap -mx-4 mt-auto mb-auto lg:w-1/2 sm:w-2/3 content-start sm:pr-10">
                              <div class="w-full sm:p-4 px-4 mb-6">
                                <h1 class="title-font font-medium text-3xl  mb-2 text-gray-900"> Bus Reservation Services</h1>
                                <div class="leading-relaxed"> Our services are the serivces on which you can rely on. </div>
                              </div>
                      
                            </div>
                            <div class="lg:w-1/2 sm:w-1/3 w-full rounded-lg overflow-hidden mt-6 sm:mt-0">
                              <img class="object-cover object-center w-full h-full" src="\Images\bus.jpg" alt="stats">
                            </div>
                          </div>
                        </section>

                                    <!-- Features Tab -->
                                    <section class="text-gray-600 body-font">
                                          <div class="container px-5 py-24 mx-auto">
                                            <div class="text-center mb-20">
                                              <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 mb-4">Our Services</h1>
                                              <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-500s">Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo juice poutine, ramps microdosing banh mi pug.</p>
                                              <div class="flex mt-6 justify-center">
                                                <div class="w-16 h-1 rounded-full bg-indigo-500 inline-flex"></div>
                                              </div>
                                            </div>
                                            <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4 md:space-y-0 space-y-6">
                                              <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
                                                <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5 flex-shrink-0">
                                                <img src="/Images/money_f.png" alt="Italian Trulli">
                                                </div>
                                                <div class="flex-grow">
                                                  <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Buget Prices</h2>
                                                  <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo juice poutine, ramps microdosing banh mi pug VHS try-hard.</p>
                                  
                                                </div>
                                              </div>
                                              <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
                                                <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5 flex-shrink-0">
                                               
                                                <img src="D:\DP Programe\Comp Sc\IA\bus-reservation\resources\views\landing\Imagesbus_f.png" alt="Italian Trulli">

                                                </div>
                                                <div class="flex-grow">
                                                  <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Quality Services</h2>
                                                  <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo juice poutine, ramps microdosing banh mi pug VHS try-hard.</p>
                                      
                                                </div>
                                              </div>
                                              <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
                                                <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5 flex-shrink-0">
                                                <img src="/Images/Seq.png" alt="Italian Trulli">  
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                  </svg>
                                                </div>
                                                <div class="flex-grow">
                                                  <h2 class="text-gray-900 text-lg title-font font-medium mb-3"> Secured Traveling</h2>
                                                  <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo juice poutine, ramps microdosing banh mi pug VHS try-hard.</p>
                    
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </section>

                                  <!-- End note -->
                                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-24 mx-auto" bg-green-100>
                          <div class="xl:w-1/2 lg:w-3/4 w-full mx-auto text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="inline-block w-8 h-8 text-gray-400 mb-8" viewBox="0 0 975.036 975.036">
                              <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
                            </svg>
                            <p class="leading-relaxed text-lg">Edison bulb retro cloud bread echo park, helvetica stumptown taiyaki taxidermy 90's cronut +1 kinfolk. Single-origin coffee ennui shaman taiyaki vape DIY tote bag drinking vinegar cronut adaptogen squid fanny pack vaporware. Man bun next level coloring book skateboard four loko knausgaard. Kitsch keffiyeh master cleanse direct trade indigo juice before they sold out gentrify plaid gastropub normcore XOXO 90's pickled cindigo jean shorts. Slow-carb next level shoindigoitch ethical authentic, yr scenester sriracha forage franzen organic drinking vinegar.</p>
                            <span class="inline-block h-1 w-10 rounded bg-indigo-500 mt-8 mb-6"></span>
                            <h2 class="text-gray-900 font-medium title-font tracking-wider text-sm">Pawan Jaiswal</h2>
                            <p class="text-gray-500">Jaiswal Bus Servises headquters 21/90 Sunjay Warn main read, Harda</p>
                          </div>
                        </div>
                      </section>
                    
                    <!-- footer -->
            
            <footer class="text-gray-600 body-font">
              </div>
              <div class="bg-gray-100">
                <div class="container px-5 py-6 mx-auto flex items-center sm:flex-row flex-col">
                  <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
                    <span class="ml-3 text-xl"><a href="index.php"> Jaiswal Bus Services</a></span>
                  </a>
                  <p class="text-sm text-gray-500 sm:ml-6 sm:mt-0 mt-4">© Jaiswal Bus Services —
                    <a class="text-gray-600 ml-1" target="_blank">Copyriht Reserved</a>
                  </p>

                </div>
              </div>
            </footer>




    <script>
        $('document').ready(function(){
            $('.btn-contact').click(function() {
                let bus_name = $(this).attr('bus-name');
                let bus_contact = $(this).attr('bus-contact');

                $('#bus_name').text(bus_name);
                $('#bus_con').text(bus_contact);
                $('#contact').modal('show');
            });

            $('.btn-reserve').click(function() {
                let bus_id = $(this).attr('bus_id');
                let start_city_id = $(this).attr('start_id');
                let end_city_id = $(this).attr('end_id');
                let res_date = $(this).attr('res_date');
                let route_id = $(this).attr('route_id');
                let route_price = $(this).attr('route_price');
                
                $('#res_date').val(res_date);
                $('#from_id').val(start_city_id);
                $('#to_id').val(end_city_id);
                $('#route_id').val(route_id);
                $('#route_price').val(route_price);
                $('#bus_id').val(bus_id);

                $('#res-form').submit();
                // $('#reserve').modal('show');
            });
        });
    </script>

    @include('sweetalert::alert')
    <script src="assets/vendor/select2/dist/js/select2.min.js"></script>
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="assets/js/argon.js?v=1.1.0"></script>
    <script src="assets/js/demo.min.js"></script>
    <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
</body>

</html>
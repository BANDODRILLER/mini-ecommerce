<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Crypto Walletx Mining</title>
    @include('admin.style')
</head>
<body>
<div
    class="flex h-screen bg-gray-50 dark:bg-gray-900"
    :class="{ 'overflow-hidden': isSideMenuOpen }"
>
    @include('sweetalert::alert')

    <!-- Desktop sidebar -->
    @include('admin.sidebar')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2
                class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
                Dashboard
            </h2>
            <!-- CTA -->
            <a
                class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
                href="/"
            >
                <div class="flex items-center">
                    <svg
                        class="w-5 h-5 mr-2"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                    >
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                        ></path>
                    </svg>
                    <span>Welcome</span>
                </div>
                <span>View more &RightArrow;</span>
            </a>
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                        >
                            <th class="px-4 py-3">User_id</th>
                            <th class="px-4 py-3">Machine</th>
                            <th class="px-4 py-3">Quantity</th>
                            <th class="px-4 py-3">Price</th>
                            <th class="px-4 py-3"> invoice</th>
                            <th class="px-4 py-3">Phone</th>
                            <th class="px-4 py-3">Status</th>



                            <th class="px-4 py-3">Action </th>

                        </tr>
                        </thead>
                        @foreach($order as  $o)
                            <tbody
                                class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                            >
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <!-- Avatar with inset shadow -->
                                        <div
                                            class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                                        >
                                            <img
                                                class="object-cover w-full h-full rounded-full"
                                                src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                                alt=""
                                                loading="lazy"
                                            />
                                            <div
                                                class="absolute inset-0 rounded-full shadow-inner"
                                                aria-hidden="true"
                                            ></div>
                                        </div>
                                        <div>
                                            <p class="font-semibold">{{$o->user_id}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{$o->name}}
                                </td>
                                <td class="px-4 py-3 text-xs">
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                        >
                          {{$o->quantity}}
                        </span>
                                </td>
                                <td class="px-4 py-3 text-xs">
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                        >
                          {{$o->price}}
                        </span>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{$o->calculated_column}}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{$o->phone_number}}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{$o->status}}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                     <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                            <a class="btn btn-primary" href="{{route('confirmorder', [ 'amount' =>$o->calculated_column ,'user_id' => $o->user_id, 'id'=>$o->id, 'name'=>$o->name,'quantity'=>$o->quantity,'status'=>'delivered',])}}">Confirm</a>
                                    </span>
                                </td>
                            </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>

            </div>

    </main>
</div>
</div>
</body>
</html>

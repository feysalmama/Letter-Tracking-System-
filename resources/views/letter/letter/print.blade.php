<div class=" w-full flex items-center justify-center">
    <h2>Letter Information</h2>
    <p><strong>Letter Type:</strong> {{ $letter->letterType->name }}</p>
    @foreach ($letter->letterType->routes as $route)
        {{-- Route ID: {{ $route->id }} --}}
        Route Name: {{ $route->name }};
        {{-- Office Name: {{ $route->office_name }} --}}
        {{ $route->in_or_out_office ? 'In' : 'Out' }}office;
        Zone: {{ $route->zone ?? 'N/A' }}
        Woreda: {{ $route->woreda ?? 'N/A' }}

        <!-- Display nodes related to this route -->
        <ol>
            @php
                $totalWaitingTime = 0; // Initialize a variable to store the total waiting time
            @endphp

            @foreach ($route->nodes as $node)
                <li>
                    Office: {{ $node->office_name }}
                    Node: {{ $node->name }}
                    {{-- In or Out Office: {{ $node->in_or_out_office ? 'In' : 'Out' }}
                            Zone: {{ $node->zone ?? 'N/A' }}
                            Woreda: {{ $node->woreda ?? 'N/A' }} --}}
                    Estimated Waiting Time: {{ $node->estimated_waiting_time }}Day;
                </li>

                @php
                    $totalWaitingTime += $node->estimated_waiting_time; // Add the current node's waiting time to the total
                @endphp
            @endforeach

        </ol>
    @endforeach

    <p><strong>Accepted Date:</strong> {{ $letter->created_at }}</p>
    <p><strong>Unique Number:</strong> {{ $letter->unique_code }}</p>
    <p><strong>Customer Name:</strong> {{ $letter->customer_name }}</p>
    <p><strong>Customer Phone:</strong> {{ $letter->customer_phone }}</p>
    <p><strong>Customer Email:</strong> {{ $letter->customer_email }}</p>
    <p><strong>Estimated Waiting Date:</strong> {{ $totalWaitingTime }} Days</p>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="window.print()">
        Print
    </button>


</div>

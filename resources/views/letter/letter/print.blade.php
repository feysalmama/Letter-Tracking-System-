<div class="flex items-center justify-center">
<h2>Letter Information</h2>
<p><strong>Letter Type:</strong> {{ $letter->letterType->name }}</p>
<p><strong>Routes:</strong></p>
<ul>
    @foreach ($letter->letterType->routes as $route)
        <li>
            Route ID: {{ $route->id }}
            Route Name: {{ $route->name }}
            Estimated Waiting Time: {{ $route->estimated_waiting_time }}
            Office Name: {{ $route->office_name }}
            In or Out Office: {{ $route->in_or_out_office ? 'In' : 'Out' }}
            Zone: {{ $route->zone ?? 'N/A' }}
            Woreda: {{ $route->woreda ?? 'N/A' }}
            
            <!-- Display nodes related to this route -->
            <ul>
                @foreach ($route->nodes as $node)
                    <li>
                        Node Name: {{ $node->name }}
                        Office Name: {{ $node->office_name }}
                        In or Out Office: {{ $node->in_or_out_office ? 'In' : 'Out' }}
                        Zone: {{ $node->zone ?? 'N/A' }}
                        Woreda: {{ $node->woreda ?? 'N/A' }}
                    </li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>

<p><strong>Accepted Date:</strong> {{ $letter->created_at }}</p>
<p><strong>Unique Number:</strong> {{ $letter->unique_code }}</p>
<p><strong>Customer Name:</strong> {{ $letter->customer_name }}</p>
<p><strong>Customer Phone:</strong> {{ $letter->customer_phone }}</p>
<p><strong>Customer Email:</strong> {{ $letter->customer_email }}</p>
<p><strong>Estimated Waiting Date:</strong> {{ $letter->estimated_waiting_time }}</p>
<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="window.print()">
    Print
</button>


</div>
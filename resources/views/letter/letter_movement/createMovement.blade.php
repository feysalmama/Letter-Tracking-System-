<x-app-layout class="">

<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Record Movement for Letter #{{ $letter->id }}</h2>

    <form action="{{ route('letter.letter-movements.record', ['letter' => $letter, 'destinationNode' => $destinationNode ]) }}" method="POST" class="w-full max-w-md" x-data="{ showReason: false }">
        @csrf
    
        <div class="mb-4">
            <label for="destinationNode" class="block text-sm font-medium text-gray-700">Destination Node:</label>
            <input type="text" id="destinationNode" value="{{ $destinationNode->name }}" class="form-input" disabled>
        </div>
    
        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Status:</label>
            <select id="status" name="status" class="form-select" x-on:change="showReason = $event.target.value === 'Cancelled'" required>
                <option value="In Progress">In Progress</option>
                <option value="Completed">Completed</option>
                <option value="Pending">Pending</option>
                <option value="Cancelled">Cancelled</option>
            </select>
        </div>
    
        <div class="mb-4" x-show="showReason">
            <label for="reason" class="block text-sm font-medium text-gray-700">Reason for Cancellation:</label>
            <input type="text" id="reason" name="reason" class="form-input">
        </div>
    
        <button type="submit" class="bg-blue-500 hover-bg-blue-700 text-white font-bold py-2 px-4 rounded focus-outline-none focus-shadow-outline-blue active-bg-blue-800">
            Record Movement
        </button>
    </form>
    
</div>


</x-app-layout >
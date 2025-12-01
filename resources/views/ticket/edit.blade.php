<x-app-layout>
    <div class="max-w-3xl mx-auto">
        <!-- Header -->
        <div class="mb-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Edit Ticket #{{ $ticket->id }}</h1>
                    <p class="mt-1 text-sm text-gray-500">Ticket Type: {{ $ticket->ticketType->type }}</p>
                </div>
                <a href="{{ route('home') }}" class="text-sm text-gray-600 hover:text-gray-900">
                    ← Back to Tickets
                </a>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-lg shadow-sm p-8">
            <form method="POST" action="{{ route('ticket.update', $ticket) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                        Name <span class="text-danger">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        value="{{ old('name', $ticket->name) }}"
                        required
                        autofocus
                        placeholder="Your full name"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition @error('name') border-danger @enderror"
                    >
                    @error('name')
                        <p class="mt-2 text-sm text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                        Email <span class="text-danger">*</span>
                    </label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        value="{{ old('email', $ticket->email) }}"
                        required
                        placeholder="your.email@example.com"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition @error('email') border-danger @enderror"
                    >
                    @error('email')
                        <p class="mt-2 text-sm text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Subject Field -->
                <div>
                    <label for="subject" class="block text-sm font-semibold text-gray-700 mb-2">
                        Subject <span class="text-danger">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="subject" 
                        name="subject" 
                        value="{{ old('subject', $ticket->subject) }}"
                        required
                        placeholder="Brief description of your issue"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition @error('subject') border-danger @enderror"
                    >
                    @error('subject')
                        <p class="mt-2 text-sm text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description Field -->
                <div>
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                        Description
                    </label>
                    <textarea 
                        id="description" 
                        name="description" 
                        rows="6"                        
                        placeholder="Provide detailed information about your issue or request..."
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition resize-none @error('description') border-danger @enderror"
                    >{{ old('description', $ticket->description) }}</textarea>
                    @error('description')
                        <p class="mt-2 text-sm text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="editor" class="block text-sm font-semibold text-gray-700 mb-2">
                        Notes <span class="text-danger">*</span>
                    </label>
                    
                    <textarea name="notes" id="editor">{!! $ticket->notes  !!} </textarea>
                </div>

                <!-- Divider -->
                <div class="border-t border-gray-200 pt-6"></div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <a 
                            href="{{ route('home') }}" 
                            class="cursor-pointer px-6 py-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition duration-200"
                        >
                            Cancel
                        </a>
                        <button 
                            type="submit"
                            class="cursor-pointer px-6 py-3 text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 rounded-lg transition duration-200 shadow-sm hover:shadow-md"
                        >
                            Update Ticket
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
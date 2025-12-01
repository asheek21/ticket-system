<script>
    let currentPage = 1;
    let searchQuery = '';

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    async function loadTickets(page = 1, search = '') {
        try {
            const url = new URL('{{ route('load-tickets') }}');
            url.searchParams.append('page', page);
            if (search) {
                url.searchParams.append('search', search);
            }

            const response = await fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            });

            if (!response.ok) throw new Error('Failed to load tickets');

            const data = await response.json();
            
            renderTickets(data.data);
            renderPagination(data.meta);

        } catch (error) {
            console.error('Error loading tickets:', error);
        }
    }

    function renderTickets(tickets) {
        const tbody = document.getElementById('ticketsTableBody');

        if (tickets.length === 0) {
            tbody.innerHTML = `
                    <tr>
                        <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                            No tickets found.
                        </td>
                    </tr>
                `;
            return;
        }

        tbody.innerHTML = tickets.map(ticket => `
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    #${ticket.id}
                </td>
                <td class="px-6 py-4 text-sm text-gray-900">
                    <a href="/ticket/${ticket.id}/edit" class="hover:text-primary-600 font-medium">
                        ${ticket.name}
                    </a>
                    <br />
                    <small class="text-xs text-gray-500">${ticket.email}</small>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700"
                title="${ticket.subject}">
                    ${ticket.subject?.length > 20 ? ticket.subject.substring(0, 20) + '...' : ticket.subject}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-3 py-1 text-xs font-semibold rounded-full"
                    title="${ticket.description}">
                        ${ticket.description?.length > 20 ? ticket.description.substring(0, 20) + '...' : ticket.description}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-3 py-1 text-xs font-semibold rounded-full ${ticket.status_color}">
                        ${ticket.status}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    ${ticket.ticket_type}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">
                    <a href="/ticket/${ticket.id}/edit" class="text-primary-600 hover:text-primary-700 font-medium">
                        View
                    </a>
                </td>
            </tr>
        `).join('');
    }

     function renderPagination(pagination) {
        const container = document.getElementById('paginationContainer');
        
        if (pagination.last_page <= 1) {
            container.innerHTML = '';
            return;
        }

        let paginationHTML = `
            <div class="flex items-center justify-between">
                <div class="text-sm text-gray-700">
                    Showing <span class="font-medium">${pagination.from}</span> to 
                    <span class="font-medium">${pagination.to}</span> of 
                    <span class="font-medium">${pagination.total}</span> results
                </div>
                <div class="flex gap-2">
        `;

        // Previous button
        paginationHTML += `
            <button 
                onclick="loadTickets(${pagination.current_page - 1}, searchQuery)"
                ${pagination.current_page === 1 ? 'disabled' : ''}
                class="cursor-pointer px-4 py-2 text-sm font-medium rounded-lg ${
                    pagination.current_page === 1 
                    ? 'bg-gray-100 text-gray-400 cursor-not-allowed' 
                    : 'bg-white text-gray-700 hover:bg-gray-50 border border-gray-300'
                }"
            >
                Previous
            </button>
        `;

        // Page numbers
        for (let i = 1; i <= pagination.last_page; i++) {
            if (
                i === 1 || 
                i === pagination.last_page || 
                (i >= pagination.current_page - 1 && i <= pagination.current_page + 1)
            ) {
                paginationHTML += `
                    <button 
                        onclick="loadTickets(${i}, searchQuery)"
                        class="cursor-pointer px-4 py-2 text-sm font-medium rounded-lg ${
                            i === pagination.current_page
                            ? 'bg-primary-600 text-white'
                            : 'bg-white text-gray-700 hover:bg-gray-50 border border-gray-300'
                        }"
                    >
                        ${i}
                    </button>
                `;
            } else if (
                i === pagination.current_page - 2 || 
                i === pagination.current_page + 2
            ) {
                paginationHTML += `<span class="px-2 text-gray-500">...</span>`;
            }
        }

        // Next button
        paginationHTML += `
            <button 
                onclick="loadTickets(${pagination.current_page + 1}, searchQuery)"
                ${pagination.current_page === pagination.last_page ? 'disabled' : ''}
                class="cursor-pointer px-4 py-2 text-sm font-medium rounded-lg ${
                    pagination.current_page === pagination.last_page
                    ? 'bg-gray-100 text-gray-400 cursor-not-allowed'
                    : 'bg-white text-gray-700 hover:bg-gray-50 border border-gray-300'
                }"
            >
                Next
            </button>
        `;

        paginationHTML += `
                </div>
            </div>
        `;

        container.innerHTML = paginationHTML;
    }

    document.getElementById('searchBtn').addEventListener('click', () => {
        searchQuery = document.getElementById('searchInput').value;
        currentPage = 1;
        loadTickets(currentPage, searchQuery);
    });

    loadTickets();
</script>

<div class="mb-4">
    <label for="memberName" class="block text-sm font-medium text-gray-700">Filter by Member:</label>
    <select name="memberName" id="memberName" class="form-select mt-1 block w-full" onchange="this.form.submit()">
        <option value="">All Members</option>
        @foreach($members as $member)
            <option value="{{ $member->id }}" {{ request('memberName') == $member->id ? 'selected' : '' }}>
                {{ $member->name }}
            </option>
        @endforeach
    </select>
</div>

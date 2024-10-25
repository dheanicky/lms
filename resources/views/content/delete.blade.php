<form action="{{ route('admin.content.destroy', $item->id) }}" method="POST" class="inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="text-red-600 hover:text-red-900 ml-4" onclick="return confirm('Are you sure you want to delete this content?')">Delete</button>

</form>

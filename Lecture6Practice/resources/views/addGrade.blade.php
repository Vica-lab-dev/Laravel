<form action="/add-user-grade" method="POST">
    {{ csrf_field() }}
    <input type="text" name="professor" placeholder="Enter professor name" required>
    <input type="text" name="subject" placeholder="Enter subject name" required>
    <input type="number" name="grade" placeholder="Enter grade" required>
    <button>Add</button>
</form>

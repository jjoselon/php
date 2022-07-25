<html>
    @foreach ($employees as $employee)
        {{ $employee->firstName }} | {{ $employee->lastName }} | {{ $employee->email }} <br>
    @endforeach
</html>

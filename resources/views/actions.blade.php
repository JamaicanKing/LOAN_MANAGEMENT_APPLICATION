<div class="flex space-x-2 justify-center">
<a href="{!! $paymentUrl !!}" class="inline-block mr-3 px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" role="button" aria-pressed="true">Payment</a>
  <a href="{!! $editUrl !!}" class="inline-block mr-3 px-6 py-2.5 bg-green-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out" role="button" aria-pressed="true">Edit</a>
  <form action="{!! $deleteUrl !!}" method="POST">
    <input type="hidden" name="_method" value="delete">
    {{ csrf_field() }}
    <button type="submit" class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out" style="margin-right:10px padding-right: 0px; flex-grow: 0;">Delete</button>
  </form>
</div>
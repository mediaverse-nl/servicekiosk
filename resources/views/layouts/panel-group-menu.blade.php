<div class="col-sm-3">
    <div class="list-group">
        <a href="#" class="list-group-item{{ Request::is('system') ? ' active' : null }}">Systemen</a>
        <a href="{!! route('panel.account.index') !!}" class="list-group-item{{ Request::is('account') ? ' active' : null }}">Account</a>
        <a href="#" class="list-group-item{{ Request::is('factuur') ? ' active' : null }}">Facturering</a>
        <a href="{!! route('panel.ticket') !!}" class="list-group-item{{ Request::is('ticket') ? ' active' : null }}">Tickets</a>
    </div>
</div>

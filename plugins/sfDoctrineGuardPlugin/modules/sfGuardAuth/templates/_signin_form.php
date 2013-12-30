<?php use_helper('I18N') ?>

<script type="text/javascript">
    $(function() {

        var cookies = document.cookie.split(";");

        for (var i = 0; i < cookies.length; i++) {
        	var cookie = cookies[i];
        	var eqPos = cookie.indexOf("=");
         	var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        	document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
        }

        $('#signin_username').val('admin');
        $('#signin_password').val('admin');
    });
</script>

<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
  <table>
    <tbody>
      <?php echo $form ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2">
          <input type="submit" value="<?php echo __('Signin', null, 'sf_guard') ?>" />
          
          <?php $routes = $sf_context->getRouting()->getRoutes() ?>
          <?php if (isset($routes['sf_guard_forgot_password'])): ?>
            <a href="<?php echo url_for('@sf_guard_forgot_password') ?>"><?php echo __('Forgot your password?', null, 'sf_guard') ?></a>
          <?php endif; ?>

          <?php if (isset($routes['sf_guard_register'])): ?>
            &nbsp; <a href="<?php echo url_for('@sf_guard_register') ?>"><?php echo __('Want to register?', null, 'sf_guard') ?></a>
          <?php endif; ?>
        </td>
      </tr>
    </tfoot>
  </table>
</form>

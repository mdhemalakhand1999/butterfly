<?php
   // get cron array
   $cron = _get_cron_array();
   // get cron schedules
   $all_schedules = wp_get_schedules();
   $date_format = 'M j, Y @ G:i';
   // now do whatever your want ?>
<div class="wrap d-none">
   <h1 class="wp-heading-inline">Scheduled Events</h1>
   <table class="widefat fixed striped">
      <thead>
         <th>Next Run (GMT/UTC)</th>
         <th>Schedule</th>
         <th>Hook</th>
      </thead>
      <tbody>
         <?php foreach ( $cron as $timestamp => $hooks ) : ?>
            <?php foreach ( (array) $hooks as $hook => $events ) : ?>
                <?php foreach ( (array) $events as $event ) : ?>
                    <tr>
                        <td>
                            <?php echo date_i18n(
                                $date_format,
                                wp_next_scheduled( $hook )
                            ); ?>
                        </td>
                        <td>
                            <?php if ( $event['schedule'] ) : ?>
                            <?php echo esc_html(
                                $schedules[ $event['schedule'] ]['display']
                            ); ?>
                            <?php else : ?>
                            Once
                            <?php endif; ?>
                            </td>
                        <td>
                        <code><?php echo esc_html( $hook ); ?></code>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
         <?php endforeach; ?>
      </tbody>
   </table>
</div>


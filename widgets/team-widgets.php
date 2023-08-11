<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


class Elementor_Team_Widget extends \Elementor\Widget_Base {

        // Team Name
        public function get_name() {
            return 'team';
        }


        //widget title
        public function get_title() {
            return esc_html__( 'Team', 'team-widget' );
        }

        // widget Icon
        public function get_icon() {
            return 'eicon-user-circle-o';
        }

        //widget help url
        public function get_custom_help_url() {
            return 'https://developers.elementor.com/docs/widgets/';
        }
    

        //Widget category

        public function get_categories() {
            return [ 'general' ];
        }

        //Widget Keywords

        public function get_keywords() {
            return [ 'team', 'member'];
        }


        // Widget Control

        protected function register_controls() {

            //content
            $this->start_controls_section(
                'content_section',
                [
                    'label' => esc_html__( 'Content', 'team-widget' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            //Team Image
            $this->add_control(
                'team_image',
                [
                    'label' => esc_html__( 'Choose Image', 'team-widget' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            //Team Name

            $this->add_control(
                'team_name',
                [
                    'label' => esc_html__( 'Team Name', 'elementor-oembed-widget' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'placeholder' => esc_html__( 'Team Name', 'team-widget' ),
                    'label_block' => true,
                    'separator' => 'after'
                ]
            );

            //Team Designation
            $this->add_control(
                'team_desg',
                [
                    'label' => esc_html__( 'Team Designation', 'team-widget' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'placeholder' => esc_html__( 'Type Team Designation', 'team-widget' ),
                    'separator' => 'before'
                ]
            );


            $this->end_controls_section();

            //Style section

            $this->start_controls_section(
                'style_section',
                [
                    'label' => esc_html__( 'Style', 'team-widget' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

            //title color

            $this->add_control(
                'title_color',
                [
                    'label' => esc_html__( 'Color', 'team-widget' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .teams h4' => 'color: {{VALUE}};',
                    ],
                    'default' => '#333'
                ]
            );

            //Title Typography

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'selector' => '{{WRAPPER}} .teams h4',
                ]
            );

             //Designation color

             $this->add_control(
                'designation_color',
                [
                    'label' => esc_html__( 'Color', 'team-widget' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .teams p' => 'color: {{VALUE}};',
                    ],
                    'default' => '#333',
                    'separator' => 'before'
                ]
            );

             //Designation Typography

             $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'designation_typography',
                    'selector' => '{{WRAPPER}} .teams p',
                ]
            );

            //Aligment
            $this->add_control(
                'team_align',
                [
                    'label' => esc_html__( 'Alignment', 'team-widget' ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => esc_html__( 'Left', 'team-widget' ),
                            'icon' => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => esc_html__( 'Center', 'team-widget' ),
                            'icon' => 'eicon-text-align-center',
                        ],
                        'right' => [
                            'title' => esc_html__( 'Right', 'team-widget' ),
                            'icon' => 'eicon-text-align-right',
                        ],
                    ],
                    'default' => 'left',
                    'toggle' => true,
                    'selectors' => [
                        '{{WRAPPER}} .teams' => 'text-align: {{VALUE}};',
                    ],
                ]
            );
    

            $this->end_controls_section();
        }

        //render date
        protected function render(){
            $settings   = $this->get_settings_for_display();
            $team_image = $settings['team_image']['url'];
            $team_name  = $settings['team_name'];
            $team_desg  = $settings['team_desg'];
        ?>

            <div class="teams">
                <img src="<?php echo $team_image; ?>" alt="">
                <h4><?php echo $team_name; ?></h4>
                <p><?php echo $team_desg; ?></p>
            </div>


        <?php

        }
}
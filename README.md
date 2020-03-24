## HRis SaaS

HRis SaaS is a web application for HR solutions. We believe HR applications must be an enjoyable and creative experience to be truly fulfilling. HRis SaaS takes the pain out of working with HR workflows by easing common tasks used in many Human Resource teams, such as:

- Personal Information Management.
- Applicant Tracking System.
- Performance Management.
- Employee Engagement.
- Integrations.
- Mobile Apps.

## Setup

HRis SaaS uses Homestead for local development envinronment. Kindly install Homestead. There's a supplied `Homstead.yaml.example` file as a guide. In addition to this, there's also an `.env.example` file provided.

Depending on the Homestead.yaml file you copied/modified, you can see which url can be accessed in your browser. Just remember, that whatever url and ip address you've decided to use, you also need to add those entries to your hosts file.

When you're up and running, you can do `vagrant up` and `vagrant ssh` to log in to homestead. There's a `./scripts/fresh.sh` shell script that you can run to run the initial setup.

When cloning all the related repositories, the file structure should look as follows:

.
└── hris-saas
    ├── app
    ├── ats
    ├── auth
    ├── core
    ├── pim
    └── ui

sudo docker kill datadog-agent 2>/dev/null
sudo docker rm datadog-agent 2>/dev/null

sudo docker run -d --name datadog-agent \
	-e DD_API_KEY="$DATADOG_API_KEY" \
	-e DD_LOGS_ENABLED=true \
	-e DD_LOGS_CONFIG_CONTAINER_COLLECT_ALL=true \
	-e DD_AC_EXCLUDE="name:datadog-agent" \
	-e DD_PROCESS_AGENT_ENABLED=true \
	-v /etc/passwd:/etc/passwd:ro \
	-v /var/run/docker.sock:/var/run/docker.sock:ro \
	-v /proc/:/host/proc/:ro \
	-v /opt/datadog-agent/run:/opt/datadog-agent/run:rw \
	-v /sys/fs/cgroup/:/host/sys/fs/cgroup:ro \
	-v "`pwd`/http_check.yaml":/etc/datadog-agent/conf.d/http_check.yaml \
	-v "`pwd`/tcp_check.yaml":/etc/datadog-agent/conf.d/tcp_check.yaml \
	datadog/agent:latest
